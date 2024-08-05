#Add JTL ajax call using jtl plugin

#1.  need to add js file which will define into info.xml file

#2.  Need to define ajax call using io.php in js file for example

#Code 
// $(document).ready(function(){
    //var shopIoUrl = window.location.origin+'/io.php';

//});

 document.getElementById('frequency-container').addEventListener('click', function(event) {
            event.preventDefault();
            if (event.target.classList.contains('remove-row')) {
                var row = event.target.parentElement;
                var frequency = row.getAttribute('data-frequency');
  
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
                    if (data.success) {
                        alert('Frequency updated successfully!');
                        // Clear the row data in the form (optional)
                        row.querySelector('.frequency-input').value = '';
                        row.querySelector('.coupon-input').value = '';
                    } else {
                        alert('Failed to update frequency: ' + (data.message || 'Unknown error'));
                    }
                });
            }
        }); 

#here is the example function i have define for LSRemove which i am sending using ajax to php function 
#then we are going to define this function LSRemove into Bootstrap.php file

/*--------------------------- AJAX IO REQUESTS --------------------------------------------*/
```php
    $dispatcher->listen(

   'shop.hook.' . \HOOK_IO_HANDLE_REQUEST , function (array &$args){
     $args['io']->register('LSRemove', [$this, 'LSRemove']);
});

#for admin and frontend we use same request HOOK_IO_HANDLE_REQUEST

// Updated function to use the `update` method

public function LSRemove($params): array {
   

    return $params;
 }


#This is how ajax call will work you can find sample plugin code in files
