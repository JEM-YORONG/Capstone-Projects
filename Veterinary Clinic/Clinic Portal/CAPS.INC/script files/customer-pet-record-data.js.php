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
                birthdate: $("#Birthdate ").val(),

                // add pet record
                rDate: $("#rDate").val(),
                rId: $("#id").val(),
                rPet: $("#Petname").val(),
                rService1: $("#service1").val(),
                rService2: $("#service2").val(),
                rService3: $("#service3").val(),
                rV1: $("#vaccine1").val(),
                rV2: $("#vaccine2").val(),
                rV3: $("#vaccine3").val(),
                rWeight: $("#rWeight").val(),
                rAbout: $("#rAbout").val(),
                rNote: $("#rNote").val(),

                // next appointment
                nDate: $("#nDate").val(),
                nId: $("#id").val(),
                nOwnerF: $("#custFirstName").val(),
                nOwnerL: $("#custLastName").val(),
                nPet: $("#Petname").val(),
                nService1: $("#service1").val(),
                nService2: $("#service2").val(),
                nService3: $("#service3").val(),
                nNumber: $("#custContact").val(),

                // edit pet record
                eDate: $("#eDate").val(),
                eId: $("#id").val(),
                ePet: $("#Petname").val(),
                eService1: $("#eservice1").val(),
                eService2: $("#eservice2").val(),
                eService3: $("#eservice3").val(),
                eV1: $("#evaccine1").val(),
                eV2: $("#evaccine2").val(),
                eV3: $("#evaccine3").val(),
                eWeight: $("#eWeight").val(),
                eAbout: $("#eAbout").val(),
                eNote: $("#eNote").val(),
                eRid: $("#testDisplay").val(),

                // edit next appointment
                enDate: $("#enxDate").val(),
                enId: $("#id").val(),
                enOwnerF: $("#custFirstName").val(),
                enOwnerL: $("#custLastName").val(),
                enPet: $("#Petname").val(),
                enService1: $("#eservice1").val(),
                enService2: $("#eservice2").val(),
                enService3: $("#eservice3").val(),
                enNumber: $("#custContact").val(),

            }


            $.ajax({
                url: 'customer-and-pet-records-function.php',
                type: 'post',
                data: data,

                success: function(response) {
                    if (response == '') {
                        //
                    } else {
                        if (response == 'emptyFields') {
                            //
                        }

                        if (response == 'customerUpdated') {
                            //
                        }

                        if (response == 'petAdded') {
                            //
                        }

                        if (response == 'pedUpdated') {
                            //
                        }

                        if (response == 'petDeleted') {
                            //
                        }

                        // edit per record
                        if (response == 'esPetRecord') {
                            alert("Pet record updated successfully.");
                        } else if (response == 'eePetRecord') {
                            alert("Error updating pet record");
                        } else {
                            // 
                        }

                        // add pet record
                        if (response == 'sPetRecord') {
                            alert("Pet record added successfully.");
                        } else if (response == 'ePetRecord') {
                            alert("Error adding pet record");
                        } else {
                            // 
                        }

                        if (response.toLowerCase().includes("petrecords")) {
                            var jsonData = JSON.parse(response);
                            var petRecordsData = jsonData.data;

                            // Clear the table before adding new rows
                            $("#pRcrd").empty();
                            $("#nVisit").empty();

                            // visit date
                            var tableData = '<table><tr><th></th><th></th></tr>';
                            petRecordsData.forEach(function(record) {
                                tableData += '<tr><td>';

                                // Check if record.date is defined
                                if (record.date !== undefined) {
                                    tableData += record.date;
                                }

                                tableData += '</td><td>';

                                // Check if record.services is defined
                                if (record.services !== undefined) {
                                    tableData += record.services;
                                }

                                tableData += '</td></tr>';
                            });

                            tableData += '</table>';

                            // next visit record
                            var tableData2 = '<table><tr><th></th></tr>';
                            petRecordsData.forEach(function(record) {
                                // Check if record.nextDate is defined
                                if (record.nextDate !== undefined) {
                                    tableData2 += '<tr><td>' + record.nextDate + '</td></tr>';
                                }
                            });

                            tableData2 += '</table>';

                            $("#pRcrd").html(tableData); //table1
                            $("#nVisit").html(tableData2); //table2
                        } else if (response.toLowerCase().includes("nopetr")) {
                            $("#pRcrd").html('<p>No pet records found.</p>');
                            $("#nVisit").html('<p>No pet records found.</p>');
                        } else {
                            console.error('Unexpected response from the server:', response);
                        }
                    }
                }
            });

        });
    }
</script>