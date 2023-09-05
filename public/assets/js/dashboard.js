$(document).ready(function () {

    $('.filter').click(function (e) {
        e.preventDefault();
        let from = $('.saleMonthFrom').val();
        let to = $('.saleMonthTo').val();
        $.post('/api/filter-sales', {
            from: from,
            to: to,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            // console.log(res);

            let globalDateHolder = [];

            let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            let dateNow = new Date();
            let dateNowString = dateNow.toLocaleDateString("en-US", options);
            Array.prototype.max = function() {
            return Math.max.apply(null, this);
            };

            Array.prototype.min = function() {
            return Math.min.apply(null, this);
            };
            // query product outs ====================================================================================================

            let sales2 = [];

            res.filterSales.forEach(element => {

                let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                let date_s  = new Date(element.created_at);
                let dateNow = new Date();

                let salesDate = date_s.toLocaleDateString("en-US", options);

                // query products

                res.products.forEach(element2 => {
                    res.customerTypes.forEach(discount => {
                        if(element.customersTypeId == discount.id) {
                            if (element.productId === element2.id) {
                                if (!discount.discountPercentage) {
                                    sales2.push({
                                    'item': element2.productName,
                                    'sale': Math.round((element.quantity * element2.productPrice + Number.EPSILON) * 100) / 100,
                                    'date': salesDate
                                    });
                                } else {
                                    sales2.push({
                                    'item': element2.productName,
                                    'sale': (element.quantity * element2.productPrice - element.quantity * element2.productPrice * parseFloat("0."+discount.discountPercentage)).toFixed(1),
                                    'date': salesDate
                                    });
                                }
                            }
                        }
                    });

                });
            });

            // end query product outs ==============================================================================================

            let salesPerMonth = Object.values(sales2.reduce((r, o) => {
            r[o.date] = r[o.date] || {Date: o.date, Sales : 0};
            r[o.date].Sales += +o.sale;
            return r;
            },{}));

            // dates in sales
            salesPerMonth.forEach(element => {
                globalDateHolder.push(element.Date);
            });

            let saleHolder = [];
            let maxValue = [];

            globalDateHolder.forEach(dates => {
                salesPerMonth.forEach(sales => {

                    maxValue.push(sales.Sales);

                    if (dates === sales.Date) {
                        saleHolder.push(sales.Sales);
                    }
                });
            });

            let total = saleHolder.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            // total sales
            $('.totalSales').html('Total: ₱' + total.toLocaleString());

            var chart = {
            series: [
                { name: "Earnings this day", data: saleHolder },
            ],

            chart: {
                type: "bar",
                height: 350,
                offsetX: -15,
                toolbar: { show: true },
                foreColor: "#313DAA",
                fontFamily: 'inherit',
                sparkline: { enabled: false },
            },


            colors: ["#313DAA", "#313DAA"],


            plotOptions: {
                bar: {
                horizontal: false,
                columnWidth: "35%",
                borderRadius: [6],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
                },
            },
            markers: { size: 0 },

            dataLabels: {
                enabled: false,
            },


            legend: {
                show: true,
            },


            grid: {
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 3,
                xaxis: {
                lines: {
                    show: false,
                },
                },
            },

            xaxis: {
                type: "category",
                categories: globalDateHolder,
                labels: {
                style: { cssClass: "grey--text lighten-2--text fill-color" },
                },
            },



            yaxis: {
                show: true,
                min: 0,
                max: maxValue.max() +100,
                tickAmount: 4,
                labels: {
                style: {
                    cssClass: "grey--text lighten-2--text fill-color",
                },
                },
            },
            stroke: {
                show: true,
                width: 3,
                lineCap: "butt",
                colors: ["transparent"],
            },


            tooltip: { theme: "dark" },

            responsive: [
                {
                breakpoint: 600,
                options: {
                    plotOptions: {
                    bar: {
                        borderRadius: 3,
                    }
                    },
                }
                }
            ]
            };
            // var chart = new ApexCharts(document.querySelector("#chart1"), chart);
            $('#chart1').hide();
            $('#filterSales').html('');
            var chart = new ApexCharts(document.querySelector("#filterSales"), chart);
            chart.render();
        })
    })

  // =====================================
  // Profit
  // =====================================


  $.get('api/getsales', function (res) {

    let globalDateHolder = [];

    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    let dateNow = new Date();
    let dateNowString = dateNow.toLocaleDateString("en-US", options);
    Array.prototype.max = function() {
      return Math.max.apply(null, this);
    };

    Array.prototype.min = function() {
      return Math.min.apply(null, this);
    };
    // query product outs ====================================================================================================

    let sales = [];

    res.productOuts.forEach(element => {

      let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      let date_s  = new Date(element.created_at);
      let dateNow = new Date();

      let salesDate = date_s.toLocaleDateString("en-US", options);

      // query products

      res.products.forEach(element2 => {
        res.customerTypes.forEach(discount => {
          if(element.customersTypeId == discount.id) {
            if (element.productId === element2.id) {
              if (!discount.discountPercentage) {
                sales.push({
                  'item': element2.productName,
                  'sale': Math.round((element.quantity * element2.productPrice + Number.EPSILON) * 100) / 100,
                  'date': salesDate
                });
              } else {
                sales.push({
                  'item': element2.productName,
                  'sale': (element.quantity * element2.productPrice - element.quantity * element2.productPrice * parseFloat("0."+discount.discountPercentage)).toFixed(1),
                  'date': salesDate
                });
              }
            }
          }
        });

      });
    });

    // end query product outs ==============================================================================================

    let salesPerMonth = Object.values(sales.reduce((r, o) => {
      r[o.date] = r[o.date] || {Date: o.date, Sales : 0};
      r[o.date].Sales += +o.sale;
      return r;
    },{}));

    // dates in sales
    salesPerMonth.forEach(element => {
      globalDateHolder.push(element.Date);
    });

    let saleHolder = [];
    let maxValue = [];

    globalDateHolder.forEach(dates => {
      salesPerMonth.forEach(sales => {

        maxValue.push(sales.Sales);

        if (dates === sales.Date) {
          saleHolder.push(sales.Sales);
        }
      });
    });

    let total = saleHolder.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
    // total sales
    $('.totalSales').html('Total: ₱' + total.toLocaleString());

    var chart = {
      series: [
        { name: "Earnings this day", data: saleHolder },
      ],

      chart: {
        type: 'bar',
        height: 350,
        offsetX: -15,
        toolbar: { show: true },
        foreColor: "#313DAA",
        fontFamily: 'inherit',
        sparkline: { enabled: false },
      },


      colors: ["#313DAA", "#b30000"],


      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "35%",
          borderRadius: [6],
          borderRadiusApplication: 'end',
          borderRadiusWhenStacked: 'all'
        },
      },
      markers: { size: 0 },

      dataLabels: {
        enabled: false,
      },


      legend: {
        show: true,
      },


      grid: {
        borderColor: "rgba(0,0,0,0.1)",
        strokeDashArray: 3,
        xaxis: {
          lines: {
            show: false,
          },
        },
      },

      xaxis: {
        type: "category",
        categories: globalDateHolder,
        labels: {
          style: { cssClass: "grey--text lighten-2--text fill-color" },
        },
      },



      yaxis: {
        show: true,
        min: 0,
        max: maxValue.max() +100,
        tickAmount: 4,
        labels: {
          style: {
            cssClass: "grey--text lighten-2--text fill-color",
          },
        },
      },
      stroke: {
        show: true,
        width: 3,
        lineCap: "butt",
        colors: ["transparent"],
      },


      tooltip: { theme: "dark" },

      responsive: [
        {
          breakpoint: 600,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 3,
              }
            },
          }
        }
      ]
    };
    var chart = new ApexCharts(document.querySelector("#chart1"), chart);
    chart.render();
  })















  $('.expenseFilter').click(function (e) {
    e.preventDefault();
    let from = $('.expenseMonthFrom').val();
    let to = $('.expenseMonthTo').val();
    $.post('/api/filter-expense', {
        from: from,
        to: to,
        _token: $('meta[name="csrf-token"]').attr('content')
    }, function (res) {
        // console.log(res);

        let globalDateHolder = [];

        let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        let dateNow = new Date();
        let dateNowString = dateNow.toLocaleDateString("en-US", options);
        Array.prototype.max_delivery = function() {
            return Math.max.apply(null, this);
        };

        Array.prototype.min = function() {
            return Math.min.apply(null, this);
        };

        // query product ins ======================================================================================================

        let delivery = [];

        res.filterExpenses.forEach(element => {
            let date_d  = new Date(element.created_at);

            let deliveryDate = date_d.toLocaleDateString("en-US", options);

            res.products.forEach(element2 => {
                if (element.productId === element2.id) {
                    delivery.push({
                        'item': element2.productName,
                        'delivery': element.quantity * element2.productPrice,
                        'date': deliveryDate
                    });
                }
            });
        });

        // end query product ins ================================================================================================

        let deliveryPerMonth = Object.values(delivery.reduce((r, o) => {
            r[o.date] = r[o.date] || {Date: o.date, Delivery : 0};
            r[o.date].Delivery += +o.delivery;
            return r;
        },{}));

        deliveryPerMonth.forEach(element => {
            globalDateHolder.push(element.Date);
        });

        // console.log(sum)

        // console.log(globalDateHolder)

        let deliveryHolder = [];
        let maxValue = [];

        globalDateHolder.forEach(dates => {
            deliveryPerMonth.forEach(delivery => {

                maxValue.push(delivery.Delivery);

                if (dates === delivery.Date) {
                deliveryHolder.push(delivery.Delivery);
                }
            });
        });

        let total = deliveryHolder.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            // total expenses
        $('.totalExpenses').html('Total: ₱' + total.toLocaleString());

        var chart = {
        series: [
            // { name: "Earnings this month:", data: [50, 390, 300, 350, 390, 180, 355, 390] },
            // { name: "Expense this month:", data: [20, 300, 325, 215, 300, 310, 280, 300] },
            // { name: "Earnings this day:", data: saleHolder },
            { name: "Expenses this day:", data: deliveryHolder },
        ],

        chart: {
            type: "bar",
            height: 350,
            offsetX: -15,
            toolbar: { show: true },
            foreColor: "#b30000",
            fontFamily: 'inherit',
            sparkline: { enabled: false },
        },


        colors: ["#b30000"],


        plotOptions: {
            bar: {
            horizontal: false,
            columnWidth: "35%",
            borderRadius: [6],
            borderRadiusApplication: 'end',
            borderRadiusWhenStacked: 'all'
            },
        },
        markers: { size: 0 },

        dataLabels: {
            enabled: false,
        },


        legend: {
            show: false,
        },


        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
            lines: {
                show: false,
            },
            },
        },

        xaxis: {
            type: "category",
            // categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08"],
            categories: globalDateHolder,
            labels: {
            style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
        },


        yaxis: {
            show: true,
            min: 0,
            max: maxValue.max_delivery() +100,
            tickAmount: 4,
            labels: {
            style: {
                cssClass: "grey--text lighten-2--text fill-color",
            },
            },
        },
        stroke: {
            show: true,
            width: 3,
            lineCap: "butt",
            colors: ["transparent"],
        },


        tooltip: { theme: "light" },

        responsive: [
            {
            breakpoint: 600,
            options: {
                plotOptions: {
                bar: {
                    borderRadius: 3,
                }
                },
            }
            }
        ]
        };
        $('#chart2').hide();
        $('#filterExpense').html('');
        var chart = new ApexCharts(document.querySelector("#filterExpense"), chart);
        chart.render();
    })
  });


  $.get('api/getsales', function (res) {
    let globalDateHolder = [];

    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    let dateNow = new Date();
    let dateNowString = dateNow.toLocaleDateString("en-US", options);
    Array.prototype.max_delivery = function() {
      return Math.max.apply(null, this);
    };

    Array.prototype.min = function() {
      return Math.min.apply(null, this);
    };

    // query product ins ======================================================================================================

    let delivery = [];

    res.productIns.forEach(element => {
      let date_d  = new Date(element.created_at);

      let deliveryDate = date_d.toLocaleDateString("en-US", options);

      res.products.forEach(element2 => {
        if (element.productId === element2.id) {
          delivery.push({
            'item': element2.productName,
            'delivery': element.quantity * element2.productPrice,
            'date': deliveryDate
          });
        }
  });
    });

    // end query product ins ================================================================================================

    let deliveryPerMonth = Object.values(delivery.reduce((r, o) => {
      r[o.date] = r[o.date] || {Date: o.date, Delivery : 0};
      r[o.date].Delivery += +o.delivery;
      return r;
    },{}));

    deliveryPerMonth.forEach(element => {
      globalDateHolder.push(element.Date);
    });

    // console.log(sum)

    // console.log(globalDateHolder)

    let deliveryHolder = [];
    let maxValue = [];

    globalDateHolder.forEach(dates => {
      deliveryPerMonth.forEach(delivery => {

        maxValue.push(delivery.Delivery);

        if (dates === delivery.Date) {
          deliveryHolder.push(delivery.Delivery);
        }
      });
    });

    let total = deliveryHolder.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            // total expenses
        $('.totalExpenses').html('Total: ₱' + total.toLocaleString());

    var chart = {
      series: [
        // { name: "Earnings this month:", data: [50, 390, 300, 350, 390, 180, 355, 390] },
        // { name: "Expense this month:", data: [20, 300, 325, 215, 300, 310, 280, 300] },
        // { name: "Earnings this day:", data: saleHolder },
        { name: "Expenses this day:", data: deliveryHolder },
      ],

      chart: {
        type: "bar",
        height: 350,
        offsetX: -15,
        toolbar: { show: true },
        foreColor: "#b30000",
        fontFamily: 'inherit',
        sparkline: { enabled: false },
      },


      colors: ["#b30000"],


      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: "35%",
          borderRadius: [6],
          borderRadiusApplication: 'end',
          borderRadiusWhenStacked: 'all'
        },
      },
      markers: { size: 0 },

      dataLabels: {
        enabled: false,
      },


      legend: {
        show: false,
      },


      grid: {
        borderColor: "rgba(0,0,0,0.1)",
        strokeDashArray: 3,
        xaxis: {
          lines: {
            show: false,
          },
        },
      },

      xaxis: {
        type: "category",
        // categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08"],
        categories: globalDateHolder,
        labels: {
          style: { cssClass: "grey--text lighten-2--text fill-color" },
        },
      },


      yaxis: {
        show: true,
        min: 0,
        max: maxValue.max_delivery() +100,
        tickAmount: 4,
        labels: {
          style: {
            cssClass: "grey--text lighten-2--text fill-color",
          },
        },
      },
      stroke: {
        show: true,
        width: 3,
        lineCap: "butt",
        colors: ["transparent"],
      },


      tooltip: { theme: "light" },

      responsive: [
        {
          breakpoint: 600,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 3,
              }
            },
          }
        }
      ]
    };
    var chart = new ApexCharts(document.querySelector("#chart2"), chart);
    chart.render();
  })



















  // =====================================
  // monthly earnings
  // =====================================

  $.get('api/getsales', function (res) {
    let globalDateHolder = [];

    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    let dateNow = new Date();
    let dateNowString = dateNow.toLocaleDateString("en-US", options);
    Array.prototype.max = function() {
      return Math.max.apply(null, this);
    };

    Array.prototype.min = function() {
      return Math.min.apply(null, this);
    };
    // query product outs ====================================================================================================

    let sales = [];

    res.productOuts.forEach(element => {

      let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      let date_s  = new Date(element.created_at);
      let dateNow = new Date();

      let salesDate = date_s.toLocaleDateString("en-US", options);

      // query products

      res.products.forEach(element2 => {
        res.customerTypes.forEach(discount => {
          if(element.customersTypeId == discount.id) {
            if (element.productId === element2.id) {
              if (!discount.discountPercentage) {
                sales.push({
                  'item': element2.productName,
                  'sale': Math.round((element.quantity * element2.productPrice + Number.EPSILON) * 100) / 100,
                  'date': salesDate
                });
              } else {
                sales.push({
                  'item': element2.productName,
                  'sale': (element.quantity * element2.productPrice - element.quantity * element2.productPrice * parseFloat("0."+discount.discountPercentage)).toFixed(1),
                  'date': salesDate
                });
              }
            }
          }
        });

      });
    });

    // end query product outs ==============================================================================================

    let salesPerMonth = Object.values(sales.reduce((r, o) => {
      r[o.date] = r[o.date] || {Date: o.date, Sales : 0};
      r[o.date].Sales += +o.sale;
      return r;
    },{}));

    // dates in sales
    salesPerMonth.forEach(element => {
      globalDateHolder.push(element.Date);
    });

    let saleHolder = [];
    let maxValue = [];

    globalDateHolder.forEach(dates => {
      salesPerMonth.forEach(sales => {

        maxValue.push(sales.Sales);

        if (dates === sales.Date) {
          saleHolder.push(sales.Sales);
        }
      });
    });

    $('.searchMonthlyEarnings').click(function () {
        let monthlyEarnings = new Date($('.monthlyEarnings').val()).toLocaleDateString("en-US", options)
        let monthAndYear = monthlyEarnings.split(' ')[1] + " " + monthlyEarnings.split(' ')[3];

        let salesComputerArrayPerMonth = [];

        salesPerMonth.forEach(sale => {
            let splitMonthInSale = sale.Date.split(' ');
            if (splitMonthInSale[1] === monthlyEarnings.split(' ')[1] && splitMonthInSale[3] === monthlyEarnings.split(' ')[3]) {
                salesComputerArrayPerMonth.push(sale.Sales);
            }
        });

        let total = salesComputerArrayPerMonth.reduce((accumulator, currentValue) => accumulator + currentValue, 0);

        $('.monthlyEarning').html("");
        $('.monthYear').html("");

        $('.monthlyEarning').append("₱" + total.toLocaleString());
        $('.monthYear').html(monthAndYear);

        console.log(total);

    });

    console.log(salesPerMonth);

    let pastYear = "";
    let yearSaleComputer = []

    salesPerMonth.forEach(sale => {
        let splitYearInSale = sale.Date.split(' ');

        if(pastYear === splitYearInSale[3]) {
            yearSaleComputer.push(splitYearInSale[3]);
            console.log('Same year ' + splitYearInSale[3]);
        } else {
            yearSaleComputer.push(splitYearInSale[3]);
            console.log('Not same year ' + splitYearInSale[3]);
        }

        console.log(yearSaleComputer);
    });
  });



  // =====================================
  // Earning
  // =====================================

  $.get('api/getsales', function (res) {

    let globalDateHolder = [];

    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    let dateNow = new Date();
    let dateNowString = dateNow.toLocaleDateString("en-US", options);
    Array.prototype.max = function() {
      return Math.max.apply(null, this);
    };

    Array.prototype.min = function() {
      return Math.min.apply(null, this);
    };
    // query product outs ====================================================================================================

    let sales = [];

    res.productOuts.forEach(element => {

      let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      let date_s  = new Date(element.created_at);
      let dateNow = new Date();

      let salesDate = date_s.toLocaleDateString("en-US", options);

      // query products

      res.products.forEach(element2 => {
        res.customerTypes.forEach(discount => {
          if(element.customersTypeId == discount.id) {
            if (element.productId === element2.id) {
              if (!discount.discountPercentage) {
                sales.push({
                  'item': element2.productName,
                  'sale': Math.round((element.quantity * element2.productPrice + Number.EPSILON) * 100) / 100,
                  'date': salesDate
                });
              } else {
                sales.push({
                  'item': element2.productName,
                  'sale': (element.quantity * element2.productPrice - element.quantity * element2.productPrice * parseFloat("0."+discount.discountPercentage)).toFixed(1),
                  'date': salesDate
                });
              }
            }
          }
        });

      });
    });

    // end query product outs ==============================================================================================

    let salesPerMonth = Object.values(sales.reduce((r, o) => {
      r[o.date] = r[o.date] || {Date: o.date, Sales : 0};
      r[o.date].Sales += +o.sale;
      return r;
    },{}));

    // dates in sales
    salesPerMonth.forEach(element => {
      globalDateHolder.push(element.Date);
    });

    let saleHolder = [];
    let maxValue = [];

    globalDateHolder.forEach(dates => {
      salesPerMonth.forEach(sales => {

        maxValue.push(sales.Sales);

        if (dates === sales.Date) {
          saleHolder.push(sales.Sales);
        }
      });
    });

    let lastEarning = saleHolder[saleHolder.length - 1];

    // sale now
    $('.saleNow').append(lastEarning.toLocaleString());
    $('.currentDateEarning').append(salesPerMonth[salesPerMonth.length - 1].Date)

    console.log(salesPerMonth)

    $('.searchDailyEarnings').click(function () {
        let dailyEarningDate = new Date($('.dailyEarningDate').val()).toLocaleDateString("en-US", options)
        let targetIndexDailyEarnings = salesPerMonth.findIndex(date => date.Date == dailyEarningDate);

        if (targetIndexDailyEarnings != -1) {
            $('.searchDailyEarningsError').hide();
            $('.searchSaleDate').show();
            $('.saleSearchDate').html("");
            $('.saleSearchEarnings').html("");
            $('.saleSearchDate').html(salesPerMonth[targetIndexDailyEarnings].Date);
            $('.saleSearchEarnings').html("₱" + salesPerMonth[targetIndexDailyEarnings].Sales.toLocaleString());
        } else {
            $('.searchSaleDate').hide();
            $('.searchDailyEarningsError').show();
            $('.searchDailyEarningsError').html("No Earnings on "+ dailyEarningDate);
        }

    })

    var earning = {
        chart: {
          id: "sparkline3",
          type: "area",
          height: 60,
          sparkline: {
            enabled: true,
          },
          group: "sparklines",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
        },
        series: [
          {
            name: "Earnings",
            color: "#49BEFF",
            // data: [25, 66, 20, 40, 12, 58, 20],
            data: saleHolder,
          },
        ],
        stroke: {
          curve: "smooth",
          width: 2,
        },
        fill: {
          colors: ["#f3feff"],
          type: "solid",
          opacity: 0.05,
        },

        markers: {
          size: 0,
        },
        tooltip: {
          theme: "dark",
          fixed: {
            enabled: true,
            position: "right",
          },
          x: {
            show: false,
          },
        },
      };
      new ApexCharts(document.querySelector("#earning"), earning).render();

  });


//   products

  $.get('/api/getmodels',function (res) {

    let productNames = [];
    let productQuantities = [];
    let colors = [];
    let productPrice = [];

    res.forEach(element => {
        let maxVal = 0xFFFFFF; // 16777215
        let randomNumber = Math.random() * maxVal;
        randomNumber = Math.floor(randomNumber);
        randomNumber = randomNumber.toString(16);
        let randColor = randomNumber.padStart(6, 0);


        colors.push(`#${randColor.toUpperCase()}`);
        productNames.push(element.productName);
        productQuantities.push(element.productQuantity);
        productPrice.push(parseFloat(element.productPrice))
    });

    console.log(productPrice);

    var productQuantity = {
        color: "#adb5bd",
        // series: [38, 40, 25],
        series: productQuantities,
        // labels: ["2022", "2021", "2020"],
        labels: productNames,
        chart: {
          width: 180,
          type: "pie",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
        },
        plotOptions: {
          pie: {
            startAngle: 0,
            endAngle: 360,
            donut: {
              size: '75%',
            },
          },
        },
        stroke: {
          show: false,
        },

        dataLabels: {
          enabled: false,
        },

        legend: {
          show: false,
        },
        colors: colors,

        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 150,
              },
            },
          },
        ],
        tooltip: {
          theme: "dark",
          fillSeriesColor: false,
        },
      };

      var productsPrice = {
        color: "#adb5bd",
        // series: [38, 40, 25],
        series: productPrice,
        // labels: ["2022", "2021", "2020"],
        labels: productNames,
        chart: {
          width: 180,
          type: "donut",
          fontFamily: "Plus Jakarta Sans', sans-serif",
          foreColor: "#adb0bb",
        },
        plotOptions: {
          pie: {
            startAngle: 0,
            endAngle: 360,
            donut: {
              size: '50%',
            },
          },
        },
        stroke: {
          show: false,
        },

        dataLabels: {
          enabled: false,
        },

        legend: {
          show: false,
        },
        colors: colors,

        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 150,
              },
            },
          },
        ],
        tooltip: {
          theme: "dark",
          fillSeriesColor: false,
        },
      };

      var productQ = new ApexCharts(document.querySelector("#productQuantity"), productQuantity);
      productQ.render();
      var productPriceChart = new ApexCharts(document.querySelector("#price"), productsPrice);
      productPriceChart.render();
    //   productPriceChart.render();
  })
})
