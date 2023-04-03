<template>
  <div class="row">
    <div class="col-lg-7">
      <div class="card-style mb-30">
        <div
          class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  "
        >
          <div class="left">
            <h6 class="text-medium mb-2">Sales Forecast</h6>
          </div>
          <div class="right">
            <div class="select-style-1 mb-2">
              <div class="select-position select-sm">
                <select class="light-bg">
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
        <div class="chart">
          <div id="legend3">
            <ul
              class="legend3 d-flex flex-wrap align-items-center mb-30"
            >
              <li>
                <div class="d-flex">
                  <span class="bg-color primary-bg" />
                  <div class="text">
                    <p class="text-sm text-success">
                      <span class="text-dark">Revenue</span> +25.55%
                      <i class="lni lni-arrow-up" />
                    </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="d-flex">
                  <span class="bg-color purple-bg" />
                  <div class="text">
                    <p class="text-sm text-success">
                      <span class="text-dark">Net Profit</span> +45.55%
                      <i class="lni lni-arrow-up" />
                    </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="d-flex">
                  <span class="bg-color orange-bg" />
                  <div class="text">
                    <p class="text-sm text-danger">
                      <span class="text-dark">Order</span> -4.2%
                      <i class="lni lni-arrow-down" />
                    </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <canvas
            id="Chart3"
            style="width: 100%; height: 450px"
          />
        </div>
      </div>
    </div>
    <!-- End Col -->
    <div class="col-lg-5">
      <div class="card-style mb-30">
        <div
          class="
                    title
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-between
                  "
        >
          <div class="left">
            <h6 class="text-medium mb-2">Traffic</h6>
          </div>
          <div class="right">
            <div class="select-style-1 mb-2">
              <div class="select-position select-sm">
                <select class="bg-ligh">
                  <option value="">Last 6 Months</option>
                  <option value="">Last 3 Months</option>
                  <option value="">Last Year</option>
                </select>
              </div>
            </div>
            <!-- end select -->
          </div>
        </div>
        <!-- End Title -->
        <div class="chart">
          <div id="legend4">
            <ul
              class="legend3 d-flex flex-wrap align-items-center mb-30"
            >
              <li>
                <div class="d-flex">
                  <span class="bg-color primary-bg" />
                  <div class="text">
                    <p class="text-sm text-success">
                      <span class="text-dark">Store Visits</span>
                      +25.55%
                      <i class="lni lni-arrow-up" />
                    </p>
                    <h2>3456</h2>
                  </div>
                </div>
              </li>
              <li>
                <div class="d-flex">
                  <span class="bg-color danger-bg" />
                  <div class="text">
                    <p class="text-sm text-danger">
                      <span class="text-dark">Visitors</span> -2.05%
                      <i class="lni lni-arrow-down" />
                    </p>
                    <h2>3456</h2>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <canvas
            id="Chart4"
            style="width: 100%; height: 420px"
          />
        </div>
        <!-- End Chart -->
      </div>
    </div>
    <!-- End Col -->
  </div>
</template>

<script>
import Chart from "chart.js/auto"

export default {
  mounted: function () {
    this.$nextTick(function () {
      var config = {
        // The type of chart we want to create
        type: "bar", // also try bar or other graph types
        // The data for our dataset
        data: {
          labels: ["Jan", "Fab", "Mar", "Apr", "May", "Jun"],
          // Information about the dataset
          datasets: [
            {
              label: "",
              backgroundColor: "#4A6CF7",
              barThickness: "flex",
              maxBarThickness: 8,
              data: [600, 700, 1000, 700, 650, 800],
            },
            {
              label: "",
              backgroundColor: "#d50100",
              barThickness: "flex",
              maxBarThickness: 8,
              data: [690, 740, 720, 1120, 876, 900],
            },
          ],
        },
        // Configuration options
        options: {
          borderColor: "#F3F6F8",
          borderWidth: 15,
          backgroundColor: "#F3F6F8",
          tooltips: {
            callbacks: {
              labelColor: function () {
                return {
                  backgroundColor: "rgba(104, 110, 255, .0)",
                }
              },
            },
            backgroundColor: "#F3F6F8",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
          },

          title: {
            display: false,
          },
          legend: {
            display: false,
          },

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
                  max: 1200,
                  min: 0,
                },
              },
            ],
            xAxes: [
              {
                gridLines: {
                  display: false,
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
      var ctx = document.getElementById("chart4").getContext("2d")
      window.myLine = new Chart(ctx, config)
    })
  },
}
</script>