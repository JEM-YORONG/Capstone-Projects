<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    function submitData(action) {
        $(document).ready(function() {
            var data = {
                action: action,
                //customer data
                updateId: $("#id").val(),
                updateLastName: $("#custLastName").val(),
                updateFirstName: $("#custFirstName").val(),
                updateContact: $("#custContact").val(),
                updateEmail: $("#custEmail").val(),
                updateAddress: $("#custAddress").val(),

                //customer pet table data
                petId: $("#petId").val(),
                petName: $("#petName").val(),
                gender: $("#gender").val(),
                birthDate: $("#birthDate").val(),
                type: $("#type").val(),
                breedd: $("#breed").val(),
                speciess: $("#species").val(),

                //pet owner data
                ownerId: $("#id").val(),
                ownerLastname: $("#custLastName").val(),
                ownerFirstname: $("#custFirstName").val(),
                ownerContact: $("#custContact").val(),
                ownerEmail: $("#custEmail").val(),
                ownerAddress: $("#custAddress").val(),

                //pet data
                id: $("#Petid").val(),
                name: $("#Petname").val(),
                breed: $("#Breed").val(),
                species: $("#Species").val(),
                birthdate: $("#Birthdate ").val()
            }

            
            $.ajax({
                url: 'customer-and-pet-records-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    alert(response);
                }
            });
            
        });
    }
</script>