/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require("bootstrap");
require("bootstrap/js/dist/util");
require("bootstrap/js/dist/tooltip");
require("jquery-ui/ui/widgets/droppable");
require("jquery-ui/ui/widgets/sortable");
require("jquery-ui/ui/widgets/selectable");
require("jquery-ui/ui/widgets/slider");
require("jquery-ui/themes/base/all.css");
import $ from "jquery";

// Menu burger
$(function () {
  // Activer le menu burger
  $(".navbar-toggler").on("click", function () {
    $(".navbar-collapse").toggleClass("show");
  });
});

$(function () {
  // Cacher tous les contenus sauf le premier
  $("#tab_info").addClass("active");
  $("#tab_form").removeClass("active");
  $("#card_body_form").addClass("d-none");

  // Gérer le clic sur les onglets
  $("#tab_info").on("click", function () {
    $("#tab_info").addClass("active");
    $("#tab_form").removeClass("active");
    $("#card_body_info").removeClass("d-none");
    $("#card_body_form").addClass("d-none");
  });

  $("#tab_form").on("click", function () {
    $("#tab_form").addClass("active");
    $("#tab_info").removeClass("active");
    $("#card_body_form").removeClass("d-none");
    $("#card_body_info").addClass("d-none");
  });
});
//---------------------------------
//Range slider price
$(function () {
  let sliderPrice = $("#price-slider");

  sliderPrice.slider({
    range: true,
    min: 0,
    max: 500000,
    values: [0, 500000],
    step: 1000,
    create: function () {
      let handles = sliderPrice.find(".ui-slider-handle");
      handles.eq(0).addClass("first-handle");
      handles.eq(1).addClass("second-handle");
    },
    slide: function (event, ui) {
      $("#minPrice").val(ui.values[0]);
      $("#maxPrice").val(ui.values[1]);
    },
  });
});

//Rangeslider mileAge
$(function () {
  let sliderMileage = $("#mileAge-slider");

  sliderMileage.slider({
    range: true,
    min: 0,
    max: 500000,
    values: [0, 500000],
    step: 1000,
    create: function () {
      let handles = sliderMileage.find(".ui-slider-handle");
      handles.eq(0).addClass("first-handle");
      handles.eq(1).addClass("second-handle");
    },
    slide: function (event, ui) {
      $("#minMileage").val(ui.values[0]);
      $("#maxMileage").val(ui.values[1]);
    },
  });
});
