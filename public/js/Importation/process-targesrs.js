 $(document).ready(function(){
        $('#processid').hide(); 
    });



    function equals(lopp){
        var countTarges =  $('#countTarges').val();
        var valueselect =  $('#select'+lopp).val();
        var duplicateB = false;
        var duplicate;
        var counti=0;
        var pulsos;
        var j;
        var h;
        var i;

        for(j=1;j <= countTarges; j++){
            var parent = $('#select'+j).val();
            for(h=1;h <= countTarges; h++){
                if(h != j){
                    var chieldren = $('#select'+h).val();
                    counti++;
                    if(parent == chieldren){
                        duplicateB =true;
                        break;
                    }
                }
            }
        }

        if(duplicateB != true){
            $('#processid').show();
        }else {
            for(i=1;i <= countTarges; i++){
                if(lopp != i){
                    var other = $('#select'+i).val();
                    if(valueselect == other)
                    {
                        $('#processid').hide();
                        swal('Error!','This column has already been selected','error');
                        break;
                    }
                }
            }
        }
    }