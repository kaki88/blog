// ---------------------------------------------------------------------------------------------GENERAL

// datepicker jquery
function date(selector, range, def) {
    $(selector).datepicker({
        dayNamesMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
        monthNamesShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jun", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec"],
        dateFormat: "yy-mm-dd",
        defaultDate: def,
        firstDay: 1,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: false,
        beforeShow: function(input, inst) {
            $(document).off('focusin.bs.modal');
        },
        onClose:function(){
            $(document).on('focusin.bs.modal');
        },
        yearRange: range
    });
}

jQuery(function($){
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        prevText: '&#x3c;Préc',
        nextText: 'Suiv&#x3e;',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin',
            'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
        monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun',
            'Jul','Aou','Sep','Oct','Nov','Dec'],
        dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
        dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
        dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        minDate: '-1M',
        maxDate: 0,
        numberOfMonths: 1,
        showButtonPanel: true
    };
    $.datepicker.setDefaults($.datepicker.regional['fr']);
});

// -----------------------------------------------------------------------galerie
$(function () {
    var filterList = {
        init: function () {
            $('#portfoliolist').mixItUp({
                animation: {
                    "duration": 554,
                    "nudge": true,
                    "reverseOut": false,
                    "effects": "translateX(20%) translateY(20%) translateZ(-100px) rotateX(90deg) rotateY(90deg) rotateZ(180deg)"
                },
                selectors: {
                    target: '.portfolio',
                    filter: '.filter'
                },
                load: {
                    filter: '.IG, .TAS, .SCORE, .VOTE, .JURY, .TWITTER, .SMS, .MAGASIN, .COURRIER'
                }
            });
        }
    };
    filterList.init();
});

// -----------------------------------------------------------------------catégories
$(function() {
    var option= $('#catselect');
    option.change(function() {
        var text = option.find('option:selected').text().toLowerCase().replace(/ /g,"-").sansAccent();
        if (option.val() == 'all'){
            location.href = window.location.origin+'/jeux';
        }
        else{
            location.href = window.location.origin+'/jeux/'+option.val()+'-'+text;
        }
    });
});

String.prototype.sansAccent = function(){
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g, // C, c
    ];
    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];

    var str = this;
    for(var i = 0; i < accent.length; i++){
        str = str.replace(accent[i], noaccent[i]);
    }

    return str;
};


