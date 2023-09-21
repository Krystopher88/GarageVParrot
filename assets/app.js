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
const $ = require("jquery");



// Menu burger
$(function () {
  // Activer le menu burger
  $(".navbar-toggler").on("click", function () {
    $(".navbar-collapse").toggleClass("show");
  });
});

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
//Range slider

