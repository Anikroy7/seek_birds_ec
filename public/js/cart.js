document.addEventListener("DOMContentLoaded", function () {
    const total = totalCartItems();
    const cartItems = document.getElementById("cartItem");
    cartItems.innerText = total;
});

const updateUi = (productId) => {
    $.ajax({
        url: "/",
        method: "GET",
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            const total = totalCartItems();
            const cartItems = document.getElementById("cartItem");
            cartItems.innerText = total;
        },
        error: function (response) {
            console.log("Error", response);
        },
    });
    $.ajax({
        url: "/store-session",
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        data: JSON.stringify({
            value: JSON.parse(localStorage.getItem("productIds")),
        }),
        success: function (response) {
            // console.log("session response", response);
        },
        error: function (response) {
            console.log("Error", response);
        },
    });
    $.ajax({
        url: "/cart",
        method: "GET",
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            const product = response.products.find((pd) => pd.id == productId);
            $(`#itemsQuantityInput-${productId}`).val(
                response.items[productId]
            );
            $(".itemsQuantity").text(response.total_items);
            $(`#current_price-${productId}`).text(
                response.items[productId] * product.current_price
            );
            $(".total_price").text(response.total_price);
            if (response.items[productId] <= 1) {
                $(`#minius-${productId}`).hide();
            } else {
                $(`#minius-${productId}`).show();
            }
        },
        error: function (response) {
            console.log("Error", response);
        },
    });
};

const removeFromCart = (event, productId) => {
    event.preventDefault();
    let productIds = JSON.parse(localStorage.getItem("productIds"));
    console.log("before delete", productIds);
    if (productIds) {
        productIds = productIds.filter((item) => !(productId in item));
    }
    localStorage.setItem("productIds", JSON.stringify(productIds));
    console.log("after delete", productIds);
    // window.location.reload(); // Refresh the page
    $.ajax({
        url: "/store-session",
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        data: JSON.stringify({
            value: JSON.parse(localStorage.getItem("productIds")),
        }),
        success: function (response) {
            // console.log("session response", response);
        },
        error: function (response) {
            console.log("Error", response);
        },
    });
    window.location.reload(); // Refresh the page
    // updateUi(productId);
};

const addToCart = (e, productId, oparator) => {
    e.preventDefault();
    const productIds = JSON.parse(localStorage.getItem("productIds"));
    if (productIds) {
        const isExits = productIds.find((id) => id[productId]);
        if (isExits) {
            productIds.forEach((id) => {
                if (id[productId]) {
                    if (oparator == "-") {
                        id[productId]--;
                    } else {
                        id[productId]++;
                    }
                    localStorage.setItem(
                        "productIds",
                        JSON.stringify(productIds)
                    );
                }
            });
        } else {
            productIds.push({ [productId]: 1 });
            localStorage.setItem("productIds", JSON.stringify(productIds));
        }
    } else {
        localStorage.setItem(
            "productIds",
            JSON.stringify([{ [String(productId)]: 1 }])
        );
    }
    updateUi(productId);
};

const totalCartItems = () => {
    const productIds = JSON.parse(localStorage.getItem("productIds"));
    const totalItem = productIds.reduce((acc, curr) => {
        const value = Object.values(curr)[0];
        acc += value;
        return acc;
    }, 0);
    return totalItem;
};


