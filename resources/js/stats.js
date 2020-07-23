$(document).ready(function(){

  var header = $('header');
  var links = $('header a');
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');
  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  });

  links.css({
    'color': 'rgb(225, 60, 60)'
  });


  var idApartment = $('#id_apt').val();
  

  // STATS CHART
  var ctx = $('#views');

    $.ajax({
      url: 'http://localhost:8000/api/stats_apt',
      method: 'GET',
      data: {
        id: idApartment
      },
      success: function(views){
        console.log(Math.max(...views))
        var myChart = new Chart (ctx, {
          type: 'line',
          data: {
            labels: moment.months(),
            datasets: [{
              label: 'Views',
              backgroundColor: 'rgba(225, 60, 60, 0.2)',
              hoverBackgroundColor: 'rgba(225, 60, 60, 0.6)',
              lineTension: 0.2,
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: 'rgba(225, 60, 60)',
              pointBackgroundColor: '#fff',
              pointBorderWidth: 1,
              pointHoverRadius: 5,
              pointHoverBackgroundColor: 'rgba(225, 60, 60)',
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointHoverBorderWidth: 2,
              pointRadius: 1,
              pointHitRadius: 10,
              data: views,
              borderColor: [
                'rgba(225, 60, 60)'
              ],
              borderWidth: 2
            }]
          },
          options: {
            scales: {
                yAxes: [{
                    ticks: {
                        max: Math.max(...views) + 2,
                        beginAtZero: true
                    }
                }]
            },
            animation: {
              duration: 1500
              
            },
            legend: {
              align: 'end'
            },
            title: {
              display: true,
              text: 'Andamento visualizzazioni',
              fontSize: 22,
              fontColor: 'rgba(225, 60, 60)',
              fontStyle: 'bold'
          }

          }
        });
      }
    })

    // MESSAGES CHART
    var cxt = $('#messages');

      $.ajax({
        url: 'http://localhost:8000/api/messages_apt',
        method: 'GET',
        data: {
          id: idApartment
        },
        success: function(messages){
          var myChart = new Chart (cxt, {
            type: 'line',
            data: {
              labels: moment.months(),
              datasets: [{
                label: 'Messaggi Ricevuti',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                hoverBackgroundColor: 'rgba(75, 192, 192, 0.2)',
                lineTension: 0.2,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: 'rgba(75, 192, 192, 1)',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: 'rgba(75, 192, 192, 1',
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: messages,
                borderColor: [
                  'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 2
              }]
            },
            options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          max: Math.max(...messages) + 2,
                          beginAtZero: true
                      }
                  }]
              },
              animation: {
                duration: 1500
              },
              legend: {
                align: 'end'
              },
              title: {
                display: true,
                text: 'Andamento messaggi',
                fontSize: 22,
                fontColor: 'rgba(75, 192, 192, 1)',
                fontStyle: 'bold'
             } 
            }
          })
        }
      })
});
