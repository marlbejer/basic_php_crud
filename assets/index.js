$(document).ready(function() {
    let messageLabel = $('.card-body label');

    window.onload = loadEmployees();

    ////////////////////////////////////////////
    //THIS FUNCTION IS FOR EDITING AN EMPLOYEE//
    ////////////////////////////////////////////
    $('.table tbody').on('click', '.fa-pencil-alt', function() {
        let id = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: {action: 'edit', id: id},
            success: (data) => {
                let resultData = JSON.parse(data);
                $('input[name="id"]').val(resultData[0].id)
                $('input[name="name"]').val(resultData[0].fullname);
                $('input[name="position"]').val(resultData[0].position);

            },
            error: function(jqxhr) {
                console.log(jqxhr.status + ' ' + jqxhr.statusText);
            }
        });
    });


    /////////////////////////////////////////////
    //THIS FUNCTION IS FOR DELETING AN EMPLOYEE//
    /////////////////////////////////////////////
    
    $('body').on('click', '.fa-trash-alt', function() {
        let id = $(this).closest('tr').find('td:eq(0)').text();
        deleteEmployee(id);
    });

    function deleteEmployee(id) {
        if(!confirm('Are you sure to delete the entry?')) return false;
        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: {action: 'delete', id: id},
            success: (data) => {
                messageLabel.text(data);
                setTimeout(() => {
                    messageLabel.text('');
                }, 3000);
                loadEmployees();
            },
            error: function(jqxhr) {
                console.log(jqxhr.status + ' ' + jqxhr.statusText);
            }
        });
    }


    /////////////////////////////////////////////
    // THIS FUNCTION IS FOR ADDING NEW EMPLOYEE//
    /////////////////////////////////////////////
    $('#add').click(() => {
        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: {action: 'add', fullname: $('input[name="name"]').val(), position: $('input[name="position"]').val(), id: $('input[name="id"]').val()},
            success: (data) => {	
                messageLabel.text(data);
                setTimeout(() => {
                    messageLabel.text('');
                }, 3000);						
                loadEmployees();
            },
            error: function(jqxhr) {
                console.log(jqxhr.status + ' ' + jqxhr.statusText);
            }
        });
    });

    ///////////////////////////////////////////////////////////
    // THIS FUNCTION IS FOR FETCHING OR GETTING ALL EMPLOYEES//
    ///////////////////////////////////////////////////////////
    function loadEmployees() {
        $.ajax({
            url: 'controller.php',
            type: 'POST',
            data: {action: 'getall'},
            success: data => {
                //console.log(data);
                
                $('#tblList tbody tr').remove(); 

                let parseJson = JSON.parse(data);

                $(parseJson).each((i, v) => {
                    //console.log(v);
                    $('#tblList').find('tbody').append(
                        '<tr>' +
                            '<td>' + v.id + '</td>' +
                            '<td>' + v.fullname + '</td>' +
                            '<td>' + v.position + '</td>' +
                            '<td>' +
                                '<i class="fas fa-pencil-alt"></i>' +
                                '<i class="fas fa-trash-alt"></i>' +
                            '</td>' +
                        '</tr>'
                        );
                });

                $('input[type=text]').val('');
            },
            error: (jqxhr) => {
                console.log(jqxhr.status + ' ' + jqxhr.statusText);
            }
        });
    }


});