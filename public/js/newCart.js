const getProducts = (productId, oparator) => {
    let productIds = JSON.parse(localStorage.getItem("productIds"));
    if (productIds) {
        const isExits = productIds.find((id) => id[productId]);
        if (isExits) {
            if (oparator == "del") {
                productIds = productIds.filter((item) => !(productId in item));
                localStorage.setItem("productIds", JSON.stringify(productIds));
            } else {
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
            }
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
    return localStorage.getItem("productIds");
};

const cartOperation = (e, productId, oparator) => {
    e.preventDefault();
    const productIds = getProducts(productId, oparator);
    console.log("products from cart", productIds);
    $.ajax({
        url: "/add-to-cart",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        contentType: "application/json", // Specify content type as JSON
        data: JSON.stringify(productIds),
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
    window.location.reload();
};
