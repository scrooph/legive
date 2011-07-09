var legive = legive ||{};

legive.donate = {};


(function($){

    var donate = legive.donate;

    //create action
    donate.create = {

        checkSpeciesSubmit: function(){
            $('#search-form').bind('submit', function(){
                var val = $(this).find('#SearchFormModel_name').val().Trim();
                //console.log(val);
                
                if (val === ''){
                    return false;
                }
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
