async function traerProductos() {
    return new Promise((resolve, reject) => {
        const url = "https://api.escuelajs.co/api/v1/products";

        $.ajax({
            url: url,
            type: "GET",
            data: JSON.stringify(),
            contentType: "application/json; charset=utf-8",
            async: true,
        })
            .done(async (productos) => {
                let rows = "";
                //console.log(productos);

                $.each(productos, (idx, producto) => {
                    rows += `
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="${producto.images[0]}" class="bd-placeholder-img card-img-top" width="100%" height="250" alt="${producto.title}">
                            <div class="card-body">
                                <h5 class="card-title">${producto.title}</h5>
                                <p class="card-text">${producto.description}</p>
                                <button
                                id="${producto.id}"
                                class="btn btn-primary text-uppercase"
                                data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Ver detalle
                                </button>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $("#row").html(rows);
                $(".btn").click(traerDetalleProducto);
                return resolve(true);
            })
            .fail((error) => {
                const errorText = "Hubo un error en el llamado a la API";
                console.log(errorText);
                return reject(errorText);
            }); // fin ajax
    }); // fin promise
}

traerProductos();

async function traerDetalleProducto(e) {
    return new Promise((resolve, reject) => {
        const url = `https://api.escuelajs.co/api/v1/products/${e.target.id}`;
        $.ajax({
            url: url,
            type: "GET",
            data: JSON.stringify(),
            contentType: "application/json; charset=utf-8",
            async: true,
        })
            .done(async (producto) => {
                $('#staticBackdropLabel').text(`${producto.title}`);
                $('#modal-body').text(`${producto.description}`)
                return resolve(true);
            })
            .fail((error) => {
                const errorText = "Hubo un error en el llamado a la API";
                console.log(errorText);
                return reject(errorText);
            }); // fin ajax
    }); // fin promise
}
