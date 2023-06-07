<template>
  <div class="w-full px-4 py-5 h-auto bg-white border my-border-gray rounded-lg shadow dark:bg-gray-800">
    <div
      class="flex flex-wrap items-center justify-between"
    >
      <div>
        <h6 class="font-semibold text-lg mb-1">Sales Forecast</h6>
      </div>
      <div>
        <div class="mb-7">
          <div class="-mt-2">
            <select class="border border-gray-300 rounded-lg bg-gray-50">
              <option value="">Last Month</option>
              <option value="">Last 3 Months</option>
              <option value="">Last Year</option>
            </select>
          </div>
        </div>
        <!-- end select -->
      </div>
    </div>
    <!-- End Title -->
    <div>
      <div>
        <ul
          class="mr-6 flex flex-wrap items-center mb-7"
        >
          <li>
            <div class="flex">
              <span class="relative ml-3 rounded-3xl primary-bg" />
              <div class="mb-2">
                <p class="flex items-center w-full text-sm text-success">
                  <span class="text-black">Revenue</span> +25.55%
                  <i class="lni lni-arrow-up" />
                </p>
              </div>
            </div>
          </li>
          <li>
            <div class="flex">
              <span class="relative ml-3 rounded-3xl bg-purple-300" />
              <div class="mb-2">
                <p class="flex items-center w-full text-sm text-success">
                  <span class="text-black">Net Profit</span> +45.55%
                  <i class="lni lni-arrow-up" />
                </p>
              </div>
            </div>
          </li>
          <li>
            <div class="flex">
              <span class="relative ml-3 rounded-3xl bg-orange-300" />
              <div class="mb-2">
                <p class="flex items-center w-full text-sm text-danger">
                  <span class="text-black">Order</span> -4.2%
                  <i class="lni lni-arrow-down" />
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <canvas
        id="chart3"
        style="width: 100%; height: 450px"
      />
    </div>
  </div>
</template>

<script>
import Chart from "chart.js/auto"

export default {
  mounted: function () {
    this.$nextTick(function () {
      var config = {
        // The type of chart we want to create
        type: "line", // also try bar or other graph types

        // The data for our dataset
        data: {
          labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          // Information about the dataset
          datasets: [
            {
              label: "Revenue",
              backgroundColor: "transparent",
              borderColor: "#4a6cf7",
              data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#4a6cf7",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
            },
            {
              label: "Profit",
              backgroundColor: "transparent",
              borderColor: "#9b51e0",
              data: [
                120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
              ],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#9b51e0",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
            },
            {
              label: "Order",
              backgroundColor: "transparent",
              borderColor: "#f2994a",
              data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
              pointBackgroundColor: "transparent",
              pointHoverBackgroundColor: "#f2994a",
              pointBorderColor: "transparent",
              pointHoverBorderColor: "#fff",
              pointHoverBorderWidth: 3,
              pointBorderWidth: 5,
              pointRadius: 5,
              pointHoverRadius: 8,
            },
          ],
        },

        // Configuration options
        options: {
          tooltips: {
            intersect: false,
            backgroundColor: "#fbfbfb",
            titleFontColor: "#8F92A1",
            titleFontSize: 16,
            titleFontFamily: "Inter",
            titleFontStyle: "400",
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 15,
            borderColor: "rgba(143, 146, 161, .1)",
            borderWidth: 1,
            title: false,
          },

          title: {
            display: false,
          },

          layout: {
            padding: {
              top: 0,
            },
          },

          legend: false,

          scales: {
            yAxes: [
              {
                gridLines: {
                  display: false,
                  drawTicks: false,
                  drawBorder: false,
                },
                ticks: {
                  padding: 35,
                  max: 300,
                  min: 50,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {
                  drawBorder: false,
                  color: "rgba(143, 146, 161, .1)",
                  zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                  padding: 20,
                },
              },
            ],
          },
        },
      }
      // =========== chart three end
      var ctx = document.getElementById("chart3").getContext("2d")
      window.myLine = new Chart(ctx, config)
    })
  },
}
</script>