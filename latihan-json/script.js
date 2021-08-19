$(document).ready(function () {
    function showAllMenu() {
        $.ajax({
            type: "GET",
            url: "pizza.json",
            dataType: "json",
            success: function (response) {
                var menus = response.menu;
                var content = '';
                $.each(menus, function (index, value) {
                    
                    content += `<div class="col-md-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <img src="img/pizza/`+value.gambar+`" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">`+value.nama+`</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rp. `+value.harga+`</h6>
                        <p class="card-text">`+value.deskripsi+`</p>
                        <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>`;
                });
                $('#menu').html(content);
            }
        });
    }
    
    showAllMenu();
    var kategori = 'pizza';
    $('.nav-link').on('click', function () {
        kategori = $(this).html();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        $('#header').html(kategori);
        if (kategori=="All Menu") {
            showAllMenu();
            return;
        }
        $.getJSON("pizza.json", function (data, textStatus, jqXHR) {
                var menu = data.menu;
                var content =``;
                $.each(menu, function (indexInArray, value) { 
                    if(value.kategori == kategori.toLowerCase()){ 
                      content += `<div class="col-md-4">
                            <div class="card mb-3" style="width: 18rem;">
                                <img src="img/pizza/`+value.gambar+`" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">`+value.nama+`</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Rp. `+value.harga+`</h6>
                                <p class="card-text">`+value.deskripsi+`</p>
                                <a href="#" class="btn btn-primary">Pesan</a>
                                </div>
                            </div>
                        </div>`
                    }    
                });
                $('#menu').html(content);
            }
        );
    });
});
