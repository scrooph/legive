var legive = legive ||{};

legive.donate = {};


(function($){

    var donate = legive.donate;

    //create action
    donate.create = {

        checkSpeciesSubmit: function(){
            $('#search-form').bind('submit', function(){
                var speciesName = $(this).find('#SearchFormModel_name').val().Trim();
                //console.log(val);
                
                if (speciesName === ''){
                    return false;
                }

                donate.create.speciesSubmit(speciesName);
                return false;
            });
        },


        speciesSubmit: function(speciesName){

            var data = {
                'SearchFormModel[name]'   : speciesName,
                'ajax'                    : 'search-form'
            };

            $.post('/legive/index.php/public/donate/create', data, function(data){
                console.log(data);
            });
        }
                


    }



    $(function(){
        donate.create.checkSpeciesSubmit();
    });

})(jQuery);



String.prototype.Trim = function() { 
    return this.replace(/(^\s*)|(\s*$)/g, ""); 
} 
 
String.prototype.LTrim = function() { 
    return this.replace(/(^\s*)/g, ""); 
} 
  
String.prototype.RTrim = function() { 
    return this.replace(/(\s*$)/g, ""); 
} 
