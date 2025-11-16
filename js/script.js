// Cart management
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Update cart badge
function updateCartBadge() {
    const badge = document.getElementById('cartBadge');
    if (badge) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        badge.textContent = totalItems;
        badge.style.display = totalItems > 0 ? 'flex' : 'none';
    }
}

// Add to cart
function addToCart(itemId) {
    fetch('api/add-to-cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ itemId: itemId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const existingItem = cart.find(item => item.id === itemId);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ id: itemId, quantity: 1 });
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartBadge();
            showNotification('Item added to cart!');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Favorite toggle
document.addEventListener('click', function(e) {
    if (e.target.closest('.favorite-btn')) {
        const btn = e.target.closest('.favorite-btn');
        btn.classList.toggle('active');
        
        const foodCard = btn.closest('.food-card');
        const itemId = foodCard.dataset.id;
        
        fetch('api/toggle-favorite.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ itemId: itemId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});

// Category filter
document.querySelectorAll('.category-item').forEach(item => {
    item.addEventListener('click', function() {
        document.querySelectorAll('.category-item').forEach(cat => cat.classList.remove('active'));
        this.classList.add('active');
        
        const category = this.dataset.category;
        filterByCategory(category);
    });
});

function filterByCategory(category) {
    fetch(`api/filter-menu.php?category=${category}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateFoodItems(data.items);
            }
        })
        .catch(error => console.error('Error:', error));
}

function updateFoodItems(items) {
    const container = document.getElementById('foodItems');
    container.innerHTML = items.map(item => `
        <div class="food-card" data-id="${item.id}">
            ${item.discount ? `<div class="discount-badge">${item.discount}% OFF</div>` : ''}
            <div class="food-image">
                <img src="${item.image}" alt="${item.name}">
            </div>
            <button class="favorite-btn">
                <i class="far fa-heart"></i>
            </button>
            <div class="food-info">
                <h3>${item.name}</h3>
                <p class="restaurant-name">${item.restaurant}</p>
                <div class="food-footer">
                    <span class="price">$${item.price}</span>
                    <button class="add-btn" onclick="addToCart(${item.id})">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

// Search functionality
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value;
        if (query.length > 2) {
            searchItems(query);
        } else if (query.length === 0) {
            filterByCategory('all');
        }
    });
}

function searchItems(query) {
    fetch(`api/search.php?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateFoodItems(data.items);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        background: #2d2d2d;
        color: #fff;
        padding: 12px 24px;
        border-radius: 10px;
        z-index: 1000;
        font-size: 14px;
    `;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 2000);
}

// Initialize
updateCartBadge();
