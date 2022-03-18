   
                  fetch("perso.json")
                 .then(response=> response.json())
                 .then(myArray=> {             
                   console.log(myArray)
              
               buildTable(myArray)
              
              $('th').on('click', function(){
              var column = $(this).data('colname')
              var order = $(this).data('order')
              var text = $(this).html()
              text = text.substring(0, text.length - 1);
              
              if(order == 'desc'){
              $(this).data("order", "asc");
              myArray = myArray.sort((a,b) => a[column] > b[column] ? 1 : -1)
              text += '&#9660'
              
              }else{
              $(this).data("order", "desc")
              myArray = myArray.sort((a,b) => a[column] < b[column] ? 1 : -1)
              text += '&#9650'
              
              }
              $(this).html(text)
              buildTable(myArray)
              })
              
              
              function buildTable(data){
              var table = document.getElementById('mytable')
              table.innerHTML =''
              
              for (var i = 0; i < data.length; i++){
              var colName = `Name-${i}`
              var colNumber = `Number-${i}`
              
              
              var row= `<tr>
                       <td> ${data[i].Name} </td>  
                       <td> ${data[i].Number} </td>           
                     </tr>`
                   table.innerHTML += row   
                  
                  }
              }
              
              })


      
       
       
