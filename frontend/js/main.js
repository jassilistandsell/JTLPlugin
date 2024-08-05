 document.getElementById('frequency-container').addEventListener('click', function(event) {
    // frequency will have form data or you can define any data in this. Params will remain same.  
                $.ajax({
                    type: 'POST',
                    url: shopIoUrl,
                    data: {
                        'io': JSON.stringify(
                            {
                                'name': 'LSRemove', 
                                'params': [{'formdata': frequency}]  
                            }
                        ),
                    }
                }).done(function(data){
                   console.log(data);
                });
            }
        });