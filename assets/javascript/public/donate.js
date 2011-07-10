var legive = legive ||{};

legive.donate = {};


(function($){

    var donate = legive.donate;

    donate= {
		init: function(){
			donate.checkSpeciesSubmit();

		},

        checkSpeciesSubmit: function(){
            $('#search-form').bind('submit', function(){
                var speciesName = $(this).find('#SearchFormModel_name').val().Trim();
                //console.log(val);
                
				if (speciesName !== ''){
					donate.speciesSubmit(speciesName);
				}

                return false;
            });
        },


        speciesSubmit: function(speciesName){

            var data = {
                'SearchFormModel[name]'   : speciesName,
                'ajax'                    : 'search-species-form'
            };

            $.post('/legive/index.php/public/donate/SearchSpecies', data, function(speciesViewData){
				$('#species-view').html(speciesViewData).css('display', '');
				donate.showBookDetail();
            });
        },


		showBookDetail: function(){
			//add click listener to show-book-detail 
			$('#show-book-detail').click(function(){
				$('#book-detail').css('display', '');
				return false;
			});
		}
                


    }



    $(function(){
        donate.init();
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
