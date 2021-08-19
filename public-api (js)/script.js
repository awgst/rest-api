$(document).ready(function () {
    function capitalized(params) {
        if (typeof params !== 'string') {
            return ''
        }
        return params[0].toUpperCase() + params.slice(1);
    }
    $.getJSON("https://pokeapi.co/api/v2/pokemon?limit=100", function (data, textStatus, jqXHR) {
            var data = data.results;
            $('#select-input').append(`<option selected disabled>Select Pokémon</option>`);
            $.each(data, function (indexInArray, value) { 
                $('#select-input').append(`<option>`+capitalized(value.name)+`</option>`);
            });
        }
    );

    $('#select-input').change(function (e) { 
        e.preventDefault();
        var pokemon = this.value;
        $.getJSON("https://pokeapi.co/api/v2/pokemon/"+pokemon.toLowerCase(), function (data, textStatus, jqXHR) {
                $('#pokemon-name').html(capitalized(data.name));
                $('#sprite').html('<img src="'+data.sprites.front_default+'" alt="" style="width: 100%;">');
                $('#data-name').html(capitalized(data.name));
                var type = '';
                $.each(data.types, function (index, value) { 
                     type += capitalized(value.type.name)+', ';
                });
                type = type.slice(0, -2);
                $('#data-type').html(type);
                $('#data-height').html((data.height/10)+" m");
                $('#data-weight').html((data.weight/10)+" kg");
                // Stats
                $('#stats-hp').html(data.stats[0].base_stat);
                $('#prog-stats-hp').prop('style', 'width: '+data.stats[0].base_stat+'%');
                $('#stats-attack').html(data.stats[1].base_stat);
                $('#prog-stats-attack').prop('style', 'width: '+data.stats[1].base_stat+'%');
                $('#stats-defense').html(data.stats[2].base_stat);
                $('#prog-stats-defense').prop('style', 'width: '+data.stats[2].base_stat+'%');
                $('#stats-spattack').html(data.stats[3].base_stat);
                $('#prog-stats-spattack').prop('style', 'width: '+data.stats[3].base_stat+'%');
                $('#stats-spdefense').html(data.stats[4].base_stat);
                $('#prog-stats-spdefense').prop('style', 'width: '+data.stats[4].base_stat+'%');
                $('#stats-speed').html(data.stats[5].base_stat);
                $('#prog-stats-speed').prop('style', 'width: '+data.stats[5].base_stat+'%');
            }
        );
    });
});