$(document).ready(function(){
    $('.collapsible').collapsible();

    var Shuffle = window.Shuffle;
    var elementGrid = document.querySelector('.grid');

    var sort_filter = "any";

    var shuffleInstance = new Shuffle(elementGrid, {
        itemSelector: '.grid-item'
    });

    $( "#sort-by-price-up" ).click(function() {
        sort_filter = "price-up";
        sortView();
    });

    $( "#sort-by-price-down" ).click(function() {
        sort_filter = "price-down";
        sortView();
    });

    $( "#sort-by-places-up" ).click(function() {
        sort_filter = "places-up";
        sortView();
    });

    $( "#sort-by-places-down" ).click(function() {
        sort_filter = "places-down";
        sortView();
    });

    $( "#sort-by-date-up" ).click(function() {
        sort_filter = "date-up";
        sortView();
    });

    $( "#sort-by-date-down" ).click(function() {
        sort_filter = "date-down";
        sortView();
    });

    function sortView() {
        switch (sort_filter) {
            case "any":
                options = {
                };
                break;
            case "price-up":
                options = {
                    reverse: true,
                    by: sortByPrice,
                };
                break;
            case "price-down":
                options = {
                    reverse: false,
                    by: sortByPrice,
                };
                break;
            case "date-up":
                options = {
                    reverse: true,
                    by: sortByDate,
                };
                break;
            case "date-down":
                options = {
                    reverse: false,
                    by: sortByDate,
                };
                break;
            case "places-up":
                options = {
                    reverse: true,
                    by: sortByPlaces,
                };
                break;
            case "places-down":
                options = {
                    reverse: false,
                    by: sortByPlaces,
                };
                break;
            default:
                break;
        }
        shuffleInstance.sort(options);
    }

    function sortByPrice(element) {
        return element.getAttribute('data-price');
    }

    function sortByDate(element) {
        return element.getAttribute('data-date');
    }

    function sortByPlaces(element) {
        return element.getAttribute('data-places');
    }

    // sort the travel once
    sortView();

    /*
        FILTER SECTION
    */
    // INIT THE SLIDER
    var slider_price = document.getElementById('filter-price');
    noUiSlider.create(slider_price, {
        start: [ 0, 50 ],
        connect: true,
        tooltips: [ wNumb({ decimals: 0 }), wNumb({ decimals: 0 }) ],
        step: 0.5,
        range: {
            'min': [   0 ],
            'max': [ 200 ]
        }
    });

    var slider_places_left = document.getElementById('filter-places');
    noUiSlider.create(slider_places_left, {
        start: [ 1 ],
        connect: true,
        tooltips: [ wNumb({ decimals: 0 }) ],
        step: 0.5,
        range: {
            'min': [   1 ],
            'max': [ 10 ]
        }
    });

    // define base var
    var minPrice = 0;
    var maxPrice = 200;
    var minPlacesLeft = 1;
    var depCity = "";
    var arrivalCity = "";
    var startDay = "";

    $("#departure_city").change(function() {
        depCity = $( this ).val();
        shuffleInstance.filter(function (element) {
            return checkFilter(element);
        });
    });

    $("#arrival_city").change(function() {
        arrivalCity = $( this ).val();
        shuffleInstance.filter(function (element) {
            return checkFilter(element);
        });
    });

    $("#starttime").change(function() {
        startDay = new Date($( this ).val()).getTime();
        shuffleInstance.filter(function (element) {
            return checkFilter(element);
        });
    });

    slider_price.noUiSlider.on('change.one', function(){
        var globalPrice = slider_price.noUiSlider.get();
        minPrice = parseFloat(globalPrice[0]);
        maxPrice = parseFloat(globalPrice[1]);
        shuffleInstance.filter(function (element) {
            return checkFilter(element);
        });
    });

    slider_places_left.noUiSlider.on('change.one', function(){
        minPlacesLeft = parseInt(slider_places_left.noUiSlider.get());
        shuffleInstance.filter(function (element) {
            return checkFilter(element);
        });
    });

    function checkFilter(element) {
        return  parseFloat(element.getAttribute('data-price')) >= minPrice
            && parseInt(element.getAttribute('data-price')) <= maxPrice
            && parseInt(element.getAttribute('data-places')) >= minPlacesLeft
            && checkCity(element.getAttribute('data-departure-city'), depCity)
            && checkCity(element.getAttribute('data-arrival-city'), arrivalCity)
            && parseInt(element.getAttribute('data-date'))*1000 >= startDay;
    }

    function checkCity(city_given, city_expected) {
        if (city_expected == "")
            return true;
        var cityRegex = '.*'+ city_expected.toLowerCase() +'.*';
        return city_given.toLowerCase().match(cityRegex);
    }
});