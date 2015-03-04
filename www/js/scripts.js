
function updateTextArea() {
            var counter = 0;
                runline ='';
            var table = document.getElementById('line-grid');
            var input_obj = table.getElementsByTagName('input');
            var trList= table.getElementsByTagName('tr');
            for (i=1; i<input_obj.length; i++)
            {       
                    if(input_obj[i].type === 'checkbox' && input_obj[i].checked === true)
                    {      
                            counter++;
                            var tdList = trList[i].getElementsByTagName('td');
                            var td2 = tdList[2].innerHTML;
                            var td6 = tdList[6].innerHTML;
                            var value = td2 + ' ' + td6;
                            var runline = runline+'   '+value;
                    }
            }
            if (counter > 0){
                    runline = runline.substr(3);
                    document.getElementById('desc').value = runline;	
            }
            else{
                document.getElementById('desc').value = oldtext;
            }
}
 
