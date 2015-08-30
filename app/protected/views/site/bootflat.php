/*
 * bootflat 2.0.4
 *
 * Description: BOOTFLAT is an open source Flat UI KIT based on Bootstrap 3.2.0 CSS framework. It provides a faster, easier and less repetitive way for web developers to create elegant web apps.
 *
 * Homepage: http://bootflat.github.com/
 *
 * By @Flathemes <info@flathemes.com>
 *
 * Last modify time: 2014-09-03
 *
 * Licensed under the MIT license. Please see LICENSE for more information.
 *
 * Copyright 2013 FLATHEMES.
 *
 */

/**
 * typography
 * --------------------------------------------------
 */
body {
  font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #434a54;
  background-color: white;
}

a {
  color: #3bafda;
  text-decoration: none;
}
a:hover, a:focus {
  color: #4fc1e9;
  text-decoration: none;
}
a:focus {
  outline: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: inherit;
  font-weight: 700;
  line-height: 1.1;
  color: inherit;
}

h1 small,
h2 small,
h3 small,
h4 small,
h5 small,
h6 small,
.h1 small,
.h2 small,
.h3 small,
.h4 small,
.h5 small,
.h6 small {
  color: #e7e9ec;
}

h1,
h2,
h3 {
  margin-top: 30px;
  margin-bottom: 15px;
}

h4,
h5,
h6 {
  margin-top: 15px;
  margin-bottom: 15px;
}

h6 {
  font-weight: normal;
}

h1,
.h1 {
  font-size: 51px;
}

h2,
.h2 {
  font-size: 43px;
}

h3,
.h3 {
  font-size: 30px;
}

h4,
.h4 {
  font-size: 19px;
}

h5,
.h5 {
  font-size: 18px;
}

h6,
.h6 {
  font-size: 14px;
}

blockquote {
  border-left: 3px solid #ccd1d9;
}

.img-rounded {
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}

.img-comment {
  margin: 24px 0;
  font-size: 15px;
  font-style: italic;
  line-height: 1.2;
}

/**
 * button
 * --------------------------------------------------
 */
.btn {
  color: white;
}
.btn, .btn.disabled, .btn[disabled] {
  background-color: #aab2bd;
  border-color: #aab2bd;
}
.btn:hover, .btn:focus, .btn:active, .btn.active {
  color: white;
  background-color: #ccd1d9;
  border-color: #ccd1d9;
  outline: none !important;
}
.btn:active, .btn.active {
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
     -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
}
.btn.disabled, .btn[disabled] {
  filter: alpha(opacity=45);
  opacity: .45;
}
.btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active, .btn-link.active, .btn-link.disabled, .btn-link[disabled] {
  color: #3bafda;
  background-color: transparent;
  border-color: transparent;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.btn-link:hover, .btn-link:focus {
  text-decoration: underline;
}
.btn-default {
  color: #434a54;
  border-color: #aab2bd !important;
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active {
  background-color: #ccd1d9;
  border-color: #ccd1d9;
}
.btn-default, .btn-default.disabled, .btn-default[disabled] {
  background-color: white;
}
.open .dropdown-toggle.btn-default {
  background-color: #ccd1d9;
  border-color: #ccd1d9;
}
.btn-primary, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {
  background-color: #3bafda;
  border-color: #3bafda;
}
.btn-primary:hover, .btn-primary:focus {
  background-color: #4fc1e9;
  border-color: #4fc1e9;
}
.open .dropdown-toggle.btn-primary {
  background-color: #4fc1e9;
  border-color: #4fc1e9;
}
.btn-info, .btn-info:active, .btn-info.active, .btn-info.disabled, .btn-info[disabled] {
  background-color: #37bc9b;
  border-color: #37bc9b;
}
.btn-info:hover, .btn-info:focus {
  background-color: #48cfad;
  border-color: #48cfad;
}
.open .dropdown-toggle.btn-info {
  background-color: #48cfad;
  border-color: #48cfad;
}
.btn-success, .btn-success:active, .btn-success.active, .btn-success.disabled, .btn-success[disabled] {
  background-color: #8cc152;
  border-color: #8cc152;
}
.btn-success:hover, .btn-success:focus {
  background-color: #a0d468;
  border-color: #a0d468;
}
.open .dropdown-toggle.btn-success {
  background-color: #a0d468;
  border-color: #a0d468;
}
.btn-warning, .btn-warning:active, .btn-warning.active, .btn-warning.disabled, .btn-warning[disabled] {
  background-color: #f6bb42;
  border-color: #f6bb42;
}
.btn-warning:hover, .btn-warning:focus {
  background-color: #ffce54;
  border-color: #ffce54;
}
.open .dropdown-toggle.btn-warning {
  background-color: #ffce54;
  border-color: #ffce54;
}
.btn-danger, .btn-danger:active, .btn-danger.active, .btn-danger.disabled, .btn-danger[disabled],
.btn-danger .open .dropdown-toggle.btn {
  background-color: #da4453;
  border-color: #da4453;
}
.btn-danger:hover, .btn-danger:focus {
  background-color: #ed5565;
  border-color: #ed5565;
}
.open .dropdown-toggle.btn-danger {
  background-color: #ed5565;
  border-color: #ed5565;
}

/**
 * button-group
 * --------------------------------------------------
 */
.btn-group.open .dropdown-toggle {
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
     -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .125);
}
.btn-group .btn {
  border-left-color: #96a0ad;
}
.btn-group.open .btn-default.dropdown-toggle, .btn-group .btn-default:focus, .btn-group .btn-default:active, .btn-group .btn-default.active {
  color: white;
}
.btn-group .btn-primary, .btn-group .btn-primary:focus, .btn-group .btn-primary:active, .btn-group .btn-primary.active {
  border-left-color: #269ecb;
}
.btn-group .btn-success, .btn-group .btn-success:focus, .btn-group .btn-success:active, .btn-group .btn-success.active {
  border-left-color: #7ab03f;
}
.btn-group .btn-warning, .btn-group .btn-warning:focus, .btn-group .btn-warning:active, .btn-group .btn-warning.active {
  border-left-color: #efa50b;
}
.btn-group .btn-danger, .btn-group .btn-danger:focus, .btn-group .btn-danger:active, .btn-group .btn-danger.active {
  border-left-color: #d1293a;
}
.btn-group .btn-info, .btn-group .btn-info:focus, .btn-group .btn-info:active, .btn-group .btn-info.active {
  border-left-color: #2fa084;
}
.btn-group .btn:first-child, .btn-group .btn-primary:first-child, .btn-group .btn-success:first-child, .btn-group .btn-warning:first-child, .btn-group .btn-danger:first-child, .btn-group .btn-info:first-child {
  border-left-color: transparent;
}

.btn-group-vertical .btn, .btn-group-vertical .btn-group .btn-primary {
  border-top-color: #96a0ad !important;
}
.btn-group-vertical .btn-primary, .btn-group-vertical .btn-primary:focus, .btn-group-vertical .btn-primary:active, .btn-group-vertical .btn-primary.active, .btn-group-vertical .btn-group .btn-primary {
  border-top-color: #269ecb !important;
}
.btn-group-vertical .btn-success, .btn-group-vertical .btn-success:focus, .btn-group-vertical .btn-success:active, .btn-group-vertical .btn-success.active, .btn-group-vertical .btn-group .btn-success {
  border-top-color: #7ab03f !important;
}
.btn-group-vertical .btn-warning, .btn-group-vertical .btn-warning:focus, .btn-group-vertical .btn-warning:active, .btn-group-vertical .btn-warning.active, .btn-group-vertical .btn-group .btn-warning {
  border-top-color: #efa50b !important;
}
.btn-group-vertical .btn-danger, .btn-group-vertical .btn-danger:focus, .btn-group-vertical .btn-danger:active, .btn-group-vertical .btn-danger.active, .btn-group-vertical .btn-group .btn-danger {
  border-top-color: #d1293a !important;
}
.btn-group-vertical .btn-info, .btn-group-vertical .btn-info:focus, .btn-group-vertical .btn-info:active, .btn-group-vertical .btn-info.active, .btn-group-vertical .btn-group .btn-info {
  border-top-color: #2fa084 !important;
}
.btn-group-vertical .btn:not(.btn-default):first-child, .btn-group-vertical .btn-primary:first-child, .btn-group-vertical .btn-success:first-child, .btn-group-vertical .btn-warning:first-child, .btn-group-vertical .btn-danger:first-child, .btn-group-vertical .btn-info:first-child {
  border-top: none;
}

/**
 * labels and badges
 * --------------------------------------------------
 */
.label,
.badge {
  background-color: #aab2bd;
}

.label-default,
.badge-default {
  color: #434a54;
  background-color: white;
  border: 1px solid #aab2bd;
}

.label-primary,
.badge-primary {
  background-color: #3bafda;
  border-color: #3bafda;
}

.label-success,
.badge-success {
  background-color: #8cc152;
  border-color: #8cc152;
}

.label-danger,
.badge-danger {
  background-color: #da4453;
  border-color: #da4453;
}

.label-warning,
.badge-warning {
  background-color: #f6bb42;
  border-color: #f6bb42;
}

.label-info,
.badge-info {
  background-color: #37bc9b;
  border-color: #37bc9b;
}

/**
 * tooltip
 * --------------------------------------------------
 */
.tooltip-inner {
  color: white;
  background-color: #434a54;
}
.tooltip.top .tooltip-arrow, .tooltip.top-left .tooltip-arrow, .tooltip.top-right .tooltip-arrow {
  border-top-color: #434a54;
}
.tooltip.right .tooltip-arrow {
  border-right-color: #434a54;
}
.tooltip.left .tooltip-arrow {
  border-left-color: #434a54;
}
.tooltip.bottom .tooltip-arrow, .tooltip.bottom-left .tooltip-arrow, .tooltip.bottom-right .tooltip-arrow {
  border-bottom-color: #434a54;
}

/**
 * popover
 * --------------------------------------------------
 */
.popover {
  color: white;
  background-color: #434a54;
  border-color: #434a54;
}
.popover-title {
  padding-bottom: 0;
  font-weight: bold;
  color: #aab2bd;
  background-color: transparent;
  border-bottom: none;
}
.popover.top .arrow, .popover.top .arrow:after {
  border-top-color: #434a54;
}
.popover.right .arrow, .popover.right .arrow:after {
  border-right-color: #434a54;
}
.popover.bottom .arrow, .popover.bottom .arrow:after {
  border-bottom-color: #434a54;
}
.popover.left .arrow, .popover.left .arrow:after {
  border-left-color: #434a54;
}

/**
 * progress
 * --------------------------------------------------
 */
.progress {
  background-color: #e6e9ed;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.progress-bar {
  background-color: #3bafda;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.progress-bar-success {
  background-color: #8cc152;
}
.progress-bar-info {
  background-color: #37bc9b;
}
.progress-bar-warning {
  background-color: #f6bb42;
}
.progress-bar-danger {
  background-color: #da4453;
}

/**
 * breadcrumb
 * --------------------------------------------------
 */
.breadcrumb {
  color: #434a54;
  background-color: #e6e9ed;
}
.breadcrumb > .active {
  color: #434a54;
}
.breadcrumb a {
  color: #3bafda;
}

.breadcrumb-arrow {
  height: 36px;
  padding: 0;
  line-height: 36px;
  list-style: none;
  background-color: #e6e9ed;
}
.breadcrumb-arrow li:first-child a {
          border-radius: 4px 0 0 4px;

  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
}
.breadcrumb-arrow li, .breadcrumb-arrow li a, .breadcrumb-arrow li span {
  display: inline-block;
  vertical-align: top;
}
.breadcrumb-arrow li:not(:first-child) {
  margin-left: -5px;
}
.breadcrumb-arrow li + li:before {
  padding: 0;
  content: "";
}
.breadcrumb-arrow li span {
  padding: 0 10px;
}
.breadcrumb-arrow li a, .breadcrumb-arrow li:not(:first-child) span {
  height: 36px;
  padding: 0 10px 0 25px;
  line-height: 36px;
}
.breadcrumb-arrow li:first-child a {
  padding: 0 10px;
}
.breadcrumb-arrow li a {
  position: relative;
  color: white;
  text-decoration: none;
  background-color: #3bafda;
  border: 1px solid #3bafda;
}
.breadcrumb-arrow li:first-child a {
  padding-left: 10px;
}
.breadcrumb-arrow li a:before, .breadcrumb-arrow li a:after {
  position: absolute;
  top: -1px;
  width: 0;
  height: 0;
  content: '';
  border-top: 18px solid transparent;
  border-bottom: 18px solid transparent;
}
.breadcrumb-arrow li a:before {
  right: -10px;
  z-index: 3;
  border-left-color: #3bafda;
  border-left-style: solid;
  border-left-width: 11px;
}
.breadcrumb-arrow li a:after {
  right: -11px;
  z-index: 2;
  border-left: 11px solid #2494be;
}
.breadcrumb-arrow li a:hover, .breadcrumb-arrow li a:focus {
  background-color: #4fc1e9;
  border: 1px solid #4fc1e9;
}
.breadcrumb-arrow li a:hover:before, .breadcrumb-arrow li a:focus:before {
  border-left-color: #4fc1e9;
}
.breadcrumb-arrow li a:active {
  background-color: #2494be;
  border: 1px solid #2494be;
}
.breadcrumb-arrow li a:active:before, .breadcrumb-arrow li a:active:after {
  border-left-color: #2494be;
}
.breadcrumb-arrow li span {
  color: #434a54;
}

/**
 * pagination
 * --------------------------------------------------
 */
.pagination > li > a, .pagination > li > span {
  color: #434a54;
  background-color: white;
  border-color: #ccd1d9;
}
.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus {
  color: white;
  background-color: #ccd1d9;
  border-color: #ccd1d9;
}
.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
  color: white;
  background-color: #8cc152;
  border-color: #8cc152;
}
.pagination > .disabled > span, .pagination > .disabled > span:hover, .pagination > .disabled > span:focus, .pagination > .disabled > a, .pagination > .disabled > a:hover, .pagination > .disabled > a:focus {
  color: #e6e9ed;
  background-color: white;
  border-color: #ccd1d9;
}

/**
 * pager
 * --------------------------------------------------
 */
.pager li > a, .pager li > span {
  color: white;
  background-color: #8cc152;
  border-color: #8cc152;
}
.pager li > a:hover, .pager li > a:focus {
  background-color: #a0d468;
  border-color: #a0d468;
}
.pager .disabled > a, .pager .disabled > a:hover, .pager .disabled > a:focus, .pager .disabled > span {
  color: #e6e9ed;
  background-color: white;
  border-color: #e6e9ed;
}

/**
 * form
 * --------------------------------------------------
 */
.form-control {
  color: #434a54;
  border-color: #aab2bd;
}
.form-control, .form-control:focus {
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.form-control:focus {
  border-color: #3bafda;
}
.form-control::-moz-placeholder, .form-control:-ms-input-placeholder, .form-control::-webkit-input-placeholder {
  color: #e6e9ed;
}
.form-control.disabled, .form-control[disabled] {
  background-color: #e6e9ed;
  border-color: #e6e9ed;
}

.input-group-btn .btn + .btn {
  border-color: #96a0ad;
  border-style: solid;
  border-width: 1px;
}
.input-group-btn .btn + .btn.btn-default {
  border-color: #ededed;
}
.input-group-btn .btn + .btn.btn-primary {
  border-color: #269ecb;
}
.input-group-btn .btn + .btn.btn-info {
  border-color: #2fa084;
}
.input-group-btn .btn + .btn.btn-success {
  border-color: #7ab03f;
}
.input-group-btn .btn + .btn.btn-warning {
  border-color: #f4af20;
}
.input-group-btn .btn + .btn.btn-danger {
  border-color: #d1293a;
}

.input-group-addon {
  color: white;
  background-color: #aab2bd;
  border-color: #96a0ad;
}
.input-group-addon .radio, .input-group-addon .checkbox {
  margin: -3px 0 -4px !important;
}

.form-search .search-query, .form-search .search-query:first-child, .form-search .search-query:last-child {
  padding: 0 17px;
          border-radius: 17px;

  -webkit-border-radius: 17px;
     -moz-border-radius: 17px;
}
.input-group .form-control:last-child {
          border-top-left-radius: 0;
          border-bottom-left-radius: 0;

  -webkit-border-top-left-radius: 0;
  -moz-border-radius-topleft: 0;
  -webkit-border-bottom-left-radius: 0;
  -moz-border-radius-bottomleft: 0;
}
.input-group .form-control:first-child {
          border-top-right-radius: 0;
          border-bottom-right-radius: 0;

  -webkit-border-top-right-radius: 0;
  -moz-border-radius-topright: 0;
  -webkit-border-bottom-right-radius: 0;
  -moz-border-radius-bottomright: 0;
}
.form-search .btn {
          border-radius: 17px;

  -webkit-border-radius: 17px;
     -moz-border-radius: 17px;
}

.search-only {
  position: relative;
}
.search-only .search-icon {
  position: absolute;
  top: 2px;
  left: 8.5px;
  z-index: 20;
  width: 30px;
  font-size: 17px;
  line-height: 30px;
  color: #e6e9ed;
  text-align: center;
}
.search-only .form-control:last-child {
  padding-left: 40px;
}

.has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline {
  color: #8cc152;
}
.has-success .form-control {
  border-color: #8cc152;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-success .form-control:focus {
  border-color: #8cc152;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-success .input-group-addon {
  background-color: #8cc152;
  border-color: #8cc152;
}
.has-success .form-control-feedback {
  color: #8cc152;
}

.has-warning .help-block, .has-warning .control-label, .has-warning .radio, .has-warning .checkbox, .has-warning .radio-inline, .has-warning .checkbox-inline {
  color: #f6bb42;
}
.has-warning .form-control {
  border-color: #f6bb42;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-warning .form-control:focus {
  border-color: #f6bb42;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-warning .input-group-addon {
  background-color: #f6bb42;
  border-color: #f6bb42;
}
.has-warning .form-control-feedback {
  color: #f6bb42;
}

.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline {
  color: #da4453;
}
.has-error .form-control {
  border-color: #da4453;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-error .form-control:focus {
  border-color: #da4453;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.has-error .input-group-addon {
  background-color: #da4453;
  border-color: #da4453;
}
.has-error .form-control-feedback {
  color: #da4453;
}

/**
 * stepper
 * --------------------------------------------------
 */
.stepper .stepper-input {
  overflow: hidden;

  -moz-appearance: textfield;
}
.stepper .stepper-input::-webkit-inner-spin-button, .stepper .stepper-input::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.stepper .stepper-arrow {
  position: absolute;
  right: 15px;
  display: block;
  width: 20px;
  height: 50%;
  text-indent: -99999px;
  cursor: pointer;
  background-color: #3bafda;
}
.stepper .stepper-arrow:hover, .stepper .stepper-arrow:active {
  background-color: #4fc1e9;
}
.stepper .up {
  top: 0;
  border: 1px solid #269ecb;
          border-top-right-radius: 3px;

  -webkit-border-top-right-radius: 3px;
  -moz-border-radius-topright: 3px;
}
.stepper .down {
  bottom: 0;
          border-bottom-right-radius: 3px;

  -webkit-border-bottom-right-radius: 3px;
  -moz-border-radius-bottomright: 3px;
}
.stepper .up::before, .stepper .down::before {
  position: absolute;
  width: 0;
  height: 0;
  content: "";
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
}
.stepper .up::before {
  top: 5px;
  left: 5px;
  border-bottom: 4px solid white;
}
.stepper .down:before {
  bottom: 5px;
  left: 6px;
  border-top: 4px solid white;
}
.stepper.disabled .stepper-arrow {
  background-color: #3bafda;
  filter: alpha(opacity=45);
  opacity: .45;
}

.selecter {
  position: relative;
  z-index: 1;
  display: block;
  max-width: 100%;
  outline: none;
  /* Open */
  /* 'Cover' Positioning */
  /* 'Bottom' Positioning */
  /* 'Bottom' + 'Cover' Positioning */
  /* Multiple Select */
  /* 'Disabled' State */
  /* Scroller Support */
}
.selecter .selecter-element {
  position: absolute;
  left: 0;
  z-index: 0;
  display: none;
  width: 100%;
  height: 100%;
  filter: alpha(opacity=0);
  opacity: 0;

  *left: -999999px;
}
.selecter .selecter-element, .selecter .selecter-element:focus {
  outline: none;

  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
  -webkit-tap-highlight-color: transparent;
}
.selecter .selecter-selected {
  position: relative;
  z-index: 2;
  display: block;
  padding: 6px 10px;
  overflow: hidden;
  text-overflow: clip;
  cursor: pointer;
  background-color: white;
  border: 1px solid #aab2bd;
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.selecter .selecter-selected:after {
  position: absolute;
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  content: "";
  border-top: 4px solid black;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent;
}
.selecter .selecter-options {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 50;
  display: none;
  width: 100%;
  max-height: 260px;
  overflow: auto;
  overflow-x: hidden;
  background-color: white;
  border: 1px solid #aab2bd;
  border-width: 0 1px 1px;
          border-radius: 0 0 4px 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
     -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          box-shadow: 0 6px 12px rgba(0, 0, 0, .175);

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
  *width: auto;
}
.selecter .selecter-group {
  display: block;
  padding: 5px 10px 4px;
  font-size: 11px;
  color: #aab2bd;
  text-transform: uppercase;
  background-color: #f5f7fa;
  border-bottom: 1px solid #e6e9ed;
}
.selecter .selecter-item {
  display: block;
  width: 100%;
  padding: 6px 10px;
  margin: 0;
  overflow: hidden;
  text-overflow: ellipsis;
  cursor: pointer;
  background-color: white;
  border-bottom: 1px solid #e6e9ed;
}
.selecter .selecter-item.selected {
  color: white;
  background-color: #3bafda;
  border-bottom-color: #4fc1e9;
}
.selecter .selecter-item.disabled {
  color: #aab2bd;
  cursor: default;
}
.selecter .selecter-item:first-child {
          border-radius: 0;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
}
.selecter .selecter-item:last-child {
  border-bottom: 0;
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.selecter .selecter-item:hover {
  background-color: #e6e9ed;
}
.selecter .selecter-item.selected:hover {
  background-color: #3bafda;
}
.selecter .selecter-item.disabled:hover, .selecter:hover .selecter-selected, .selecter.disabled .selecter-item:hover {
  background-color: white;
}
.selecter.open {
  z-index: 3;
  outline: 0;
}
.selecter.open .selecter-selected {
  z-index: 51;
  border: 1px solid #3bafda;
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.selecter.open .selecter-selected, .selecter.focus .selecter-selected {
  background-color: white;
}
.selecter.cover .selecter-options {
  top: 0;
  border-width: 1px;
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.selecter.cover .selecter-options .selecter-item.first {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.selecter.cover.open .selecter-selected {
  z-index: 49;
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.selecter.bottom .selecter-options {
  top: auto;
  bottom: 100%;
  border-width: 1px 1px 0;
}
.selecter.bottom .selecter-item:last-child {
  border: none;
          border-radius: 0;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
}
.selecter.bottom.open .selecter-selected {
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.selecter.bottom.open .selecter-options {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.selecter.bottom.cover .selecter-options {
  top: auto;
  bottom: 0;
}
.selecter.bottom.cover.open .selecter-selected, .selecter.bottom.cover.open .selecter-options {
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.selecter.multiple .selecter-options {
  position: static;
  display: block;
  width: 100%;
  border-width: 1px;
          border-radius: 4px;
  box-shadow: none;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.selecter.disabled .selecter-selected {
  color: #aab2bd;
  cursor: default;
  background-color: #e6e9ed;
  border-color: #e6e9ed;
}
.selecter.disabled .selecter-options {
  background-color: #e6e9ed;
  border-color: #e6e9ed;
}
.selecter.disabled .selecter-group, .selecter.disabled .selecter-item {
  color: #aab2bd;
  cursor: default;
  background-color: #e6e9ed;
  border-color: #e6e9ed;
}
.selecter.disabled .selecter-item.selected {
  color: white;
  background-color: #3bafda;
  filter: alpha(opacity=45);
  opacity: .45;
}
.selecter .selecter-options.scroller {
  overflow: hidden;
}
.selecter .selecter-options.scroller .scroller-content {
  max-height: 260px;
  padding: 0;
}

/**
 * checkbox and radio
 * --------------------------------------------------
 */
.checkbox, .radio {
  padding-left: 0;
  margin-top: 0;
}

.checkbox label, .radio label {
  position: relative;
  top: 2px;
  padding-left: 5px;
}

.icheckbox_flat,
.iradio_flat {
  display: inline-block;
  width: 20px;
  height: 20px;
  padding: 0 !important;
  margin: 0;
  vertical-align: middle;
  cursor: pointer;
  background: url("../bootflat/img/check_flat/default.png") no-repeat;
  border: none;

  *display: inline;
}

.icheckbox_flat {
  background-position: 0 0;
}
.icheckbox_flat.checked {
  background-position: -22px 0;
}
.icheckbox_flat.disabled {
  cursor: default;
  background-position: -44px 0;
}
.icheckbox_flat.checked.disabled {
  background-position: -66px 0;
}

.iradio_flat {
  background-position: -88px 0;
}
.iradio_flat.checked {
  background-position: -110px 0;
}
.iradio_flat.disabled {
  cursor: default;
  background-position: -132px 0;
}
.iradio_flat.checked.disabled {
  background-position: -154px 0;
}

/**
 * toggle
 * --------------------------------------------------
 */
.toggle {
  height: 32px;
}
.toggle input[type="checkbox"], .toggle input[type="radio"] {
  width: 0;
  height: 0;
  padding: 0;
  margin: 0;
  text-indent: -100000px;
  filter: alpha(opacity=0);
  opacity: 0;
}
.toggle .handle {
  position: relative;
  top: -20px;
  left: 0;
  display: block;
  width: 50px;
  height: 32px;
  background-color: white;
          border-radius: 19px;
  -webkit-box-shadow: inset 0 0 0 1px #b8bfc8;
     -moz-box-shadow: inset 0 0 0 1px #b8bfc8;
          box-shadow: inset 0 0 0 1px #b8bfc8;

  -webkit-border-radius: 19px;
     -moz-border-radius: 19px;
}
.toggle .handle:before, .toggle .handle:after {
  position: absolute;
  top: 1px;
  left: 1px;
  display: block;
  width: 30px;
  height: 30px;
  content: "";
  background-color: white;
          border-radius: 30px;
  -webkit-box-shadow: inset 0 0 0 1px #b8bfc8, 1px 1px 1px #c7ccd3;
     -moz-box-shadow: inset 0 0 0 1px #b8bfc8, 1px 1px 1px #c7ccd3;
          box-shadow: inset 0 0 0 1px #b8bfc8, 1px 1px 1px #c7ccd3;
  -webkit-transition: all .25s ease-in-out;
     -moz-transition: all .25s ease-in-out;
          transition: all .25s ease-in-out;

  -webkit-border-radius: 30px;
     -moz-border-radius: 30px;
}
.toggle input[type="checkbox"]:disabled + .handle, .toggle input[type="radio"]:disabled + .handle, .toggle input[type="checkbox"]:disabled + .handle:before, .toggle input[type="radio"]:disabled + .handle:before, .toggle input[type="checkbox"]:disabled + .handle:after, .toggle input[type="radio"]:disabled + .handle:after {
  background-color: #e6e9ed;
  filter: alpha(opacity=60);
  opacity: .6;
}
.toggle input[type="checkbox"]:checked + .handle:before, .toggle input[type="radio"]:checked + .handle:before {
  width: 50px;
  background-color: #a0d468;
}
.toggle input[type="checkbox"]:checked + .handle:after, .toggle input[type="radio"]:checked + .handle:after {
  left: 20px;
  -webkit-box-shadow: inset 0 0 0 1px #f5f7fa, 1px 1px 1px #c7ccd3;
     -moz-box-shadow: inset 0 0 0 1px #f5f7fa, 1px 1px 1px #c7ccd3;
          box-shadow: inset 0 0 0 1px #f5f7fa, 1px 1px 1px #c7ccd3;
}

/**
 * calendar
 * --------------------------------------------------
 */
.calendar {
  padding: 20px;
  color: white;
  background-color: #fd9883;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.calendar .unit {
  float: left;
  width: 14.28%;
  text-align: center;
}
.calendar .years .prev {
  text-align: left;
}
.calendar .years .next {
  text-align: right;
}
.calendar .years .prev em, .calendar .years .next em {
  position: relative;
  display: inline-block;
  width: 34px;
  height: 34px;
  cursor: pointer;
  border: 1px solid white;
          border-radius: 50%;

  -webkit-border-radius: 50%;
     -moz-border-radius: 50%;
}
.calendar .years .prev em:before, .calendar .years .next em:before {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  margin-top: 6px;
  font-size: 0;
  content: "";
  border-style: solid;
  border-width: 7px;
}
.calendar .years .prev em:before {
  top: 3px;
  left: 4px;
  border-color: transparent white transparent transparent;
}
.calendar .years .next em:before {
  top: 3px;
  left: 13px;
  border-color: transparent transparent transparent white;
}
.calendar .years .prev em:hover, .calendar .years .next em:hover, .calendar .years .prev em:active, .calendar .years .next em:active {
  border-color: #e9573f;
}
.calendar .years .prev em:hover:before, .calendar .years .prev em:active:before {
  border-color: transparent #e9573f transparent transparent;
}
.calendar .years .next em:hover:before, .calendar .years .next em:active:before {
  border-color: transparent transparent transparent #e9573f;
}
.calendar .years .monyear {
  float: left;
  width: 71.42%;
  height: 34px;
  line-height: 34px;
  text-align: center;
}
.calendar .days {
  padding-top: 15px;
  margin-top: 15px;
  border-top: 1px solid #ee7f6d;
}
.calendar .days .unit {
  height: 34px;
  margin-bottom: 3px;
  line-height: 34px;
  text-align: center;
}
.calendar .days .unit b {
  width: 34px;
  height: 34px;
  font-weight: normal;
          border-radius: 50%;

  -webkit-border-radius: 50%;
     -moz-border-radius: 50%;
}
.calendar .days .unit:hover b, .calendar .days .unit:active b, .calendar .days .unit.active b {
  display: inline-block;
  color: #e9573f;
  cursor: pointer;
  background-color: white;
  -webkit-transition: all .2s ease-in-out;
     -moz-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
}
.calendar .days .unit.older b {
  width: auto;
  height: auto;
  color: #e9573f;
  cursor: default;
  background-color: transparent;
}

/**
 * pricing
 * --------------------------------------------------
 */
.pricing ul {
  padding: 0;
  list-style: none;
}
.pricing .unit {
  position: relative;
  display: inline-block;
  min-width: 250px;
  text-align: center;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.pricing .unit.active {
  top: 5px;
  z-index: 1;
  margin-right: -36px;
  margin-left: -36px;
  -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, .6);
     -moz-box-shadow: 0 0 8px rgba(0, 0, 0, .6);
          box-shadow: 0 0 8px rgba(0, 0, 0, .6);
}
.pricing .unit.active .price-title h3 {
  font-size: 40px;
}
@media screen and (max-width: 767px) {
  .pricing .unit {
    display: block;
    margin-bottom: 20px;
  }
  .pricing .unit.active {
    top: 0;
    margin-right: 0;
    margin-left: 0;
  }
  .pricing .unit.active .price-title h3 {
    font-size: 30px;
  }
}
.pricing .price-title {
  padding: 20px 20px 10px;
  color: #fff;
          border-top-left-radius: 4px;
          border-top-right-radius: 4px;

  -webkit-border-top-left-radius: 4px;
  -moz-border-radius-topleft: 4px;
  -webkit-border-top-right-radius: 4px;
  -moz-border-radius-topright: 4px;
}
.pricing .price-title h3, .pricing .price-title h3 > p {
  margin: 0;
}
.pricing .price-body {
  padding: 20px 20px 10px;
}
.pricing .price-body ul {
  padding-top: 10px;
}
.pricing .price-body li {
  margin-bottom: 10px;
}
.pricing .price-body h4 {
  margin: 0;
}
.pricing .price-foot {
  padding: 20px;
  background-color: #e6e9ed;
          border-bottom-right-radius: 4px;
          border-bottom-left-radius: 4px;

  -webkit-border-bottom-left-radius: 4px;
  -moz-border-radius-bottomleft: 4px;
  -webkit-border-bottom-right-radius: 4px;
  -moz-border-radius-bottomright: 4px;
}
.pricing .price-primary .price-title {
  background-color: #4fc1e9;
}
.pricing .price-primary .price-body {
  background-color: #d7f1fa;
}
.pricing .price-primary .price-body ul {
  border-top: 1px solid #aae1f4;
}
.pricing .price-success .price-title {
  background-color: #a0d468;
}
.pricing .price-success .price-body {
  background-color: #ebf6df;
}
.pricing .price-success .price-body ul {
  border-top: 1px solid #d2ebb7;
}
.pricing .price-warning .price-title {
  background-color: #ffce54;
}
.pricing .price-warning .price-body {
  background-color: #fffaed;
}
.pricing .price-warning .price-body ul {
  border-top: 1px solid #ffebba;
}

/**
 * alert
 * --------------------------------------------------
 */
.alert h4 {
  margin-bottom: 10px;
  font-weight: bold;
}
.alert-dismissable .close {
  color: black;
}
.alert-info {
  background-color: #7cd1ef;
  border: #4fc1e9;
}
.alert-warning {
  background-color: #ffdd87;
  border: #ffce54;
}
.alert-danger {
  background-color: #f2838f;
  border: #ed5565;
}
.alert-success {
  background-color: #b9df90;
  border: #a0d468;
}
.alert .alert-link {
  text-decoration: underline;
  cursor: pointer;
  filter: alpha(opacity=65);
  opacity: .65;
}
.alert .alert-link:hover, .alert .alert-link:focus {
  filter: alpha(opacity=45);
  opacity: .45;
}
.alert .btn-link, .alert .btn-link:hover, .alert .btn-link:focus {
  color: black;
  filter: alpha(opacity=65);
  opacity: .65;
}
.alert .btn-link:focus, .alert .btn-link:hover {
  text-decoration: none;
  filter: alpha(opacity=40);
  opacity: .4;
}

/**
 * tab
 * --------------------------------------------------
 */
.nav-tabs {
  background-color: #e6e9ed;
  border-bottom: none;
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.nav-tabs > li {
  margin-bottom: 0;
  border-left: 1px solid #ccd1d9;
}
.nav-tabs > li:first-child {
  border-left: none;
}
.nav-tabs > li > a {
  margin-right: 0;
  color: #434a54;
  border: none;
          border-radius: 0;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
}
.nav-tabs > li:first-child > a {
          border-radius: 4px 0 0 0;

  -webkit-border-radius: 4px 0 0 0;
     -moz-border-radius: 4px 0 0 0;
}
.nav-tabs > li > a:focus, .nav-tabs > li > a:hover {
  background-color: #f5f7fa;
  border: none;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  background-color: white !important;
  border: none;
}
.nav-tabs .dropdown-toggle, .nav-tabs .dropdown-toggle:hover, .nav-tabs .dropdown-toggle:focus {
  color: #434a54;
}
.nav-tabs li.dropdown.open .dropdown-toggle {
  color: #434a54;
  background-color: #f5f7fa;
}
.nav-tabs li.dropdown.active.open .dropdown-toggle {
  color: #434a54;
}
.nav-tabs li.dropdown.active.open .dropdown-toggle .caret, .nav-tabs li.dropdown.active .dropdown-toggle .caret {
  border-top-color: #434a54;
  border-bottom-color: #434a54;
}
.nav-tabs li.dropdown.open .caret, .nav-tabs li.dropdown.open.active .caret, .nav-tabs li.dropdown.open a:hover .caret, .nav-tabs li.dropdown.open a:focus .caret, .nav-tabs .dropdown-toggle .caret, .nav-tabs .dropdown-toggle:hover .caret, .nav-tabs .dropdown-toggle:focus .caret {
  border-top-color: #434a54;
  border-bottom-color: #434a54;
}
.nav-tabs.nav-justified > li > a {
  margin-bottom: 0;
  text-align: center;
}
.nav-tabs.nav-justified > .dropdown .dropdown-menu {
  top: auto;
  left: auto;
}
.nav-tabs.nav-justified > li > a {
          border-radius: 0;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
}
.nav-tabs.nav-justified > li:first-child > a {
          border-radius: 4px 0 0 0;

  -webkit-border-radius: 4px 0 0 0;
     -moz-border-radius: 4px 0 0 0;
}
.nav-tabs.nav-justified > li:last-child > a {
          border-radius: 0 4px 0 0;

  -webkit-border-radius: 0 4px 0 0;
     -moz-border-radius: 0 4px 0 0;
}
.nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus {
  border: none;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li > a {
    border-bottom: none;
            border-radius: 0;

    -webkit-border-radius: 0;
       -moz-border-radius: 0;
  }
  .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus {
    border-bottom: none;
  }
}
.tab-content {
  padding: 10px;
}

.tabs-below .nav-tabs {
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.tabs-below .nav-tabs > li:first-child > a {
          border-radius: 0 0 0 4px;

  -webkit-border-radius: 0 0 0 4px;
     -moz-border-radius: 0 0 0 4px;
}
.tabs-below .nav-tabs.nav-justified > li:last-child > a {
          border-radius: 0 0 4px 0;

  -webkit-border-radius: 0 0 4px 0;
     -moz-border-radius: 0 0 4px 0;
}

.tabs-left .nav-tabs > li,
.tabs-right .nav-tabs > li {
  float: none;
  border-top: 1px solid #ccd1d9;
  border-left: none;
}

.tabs-left .nav-tabs > li:first-child,
.tabs-right .nav-tabs > li:first-child {
  border-top: none;
}

.tabs-left .nav-tabs > li > a,
.tabs-right .nav-tabs > li > a {
  min-width: 74px;
  margin-right: 0;
}

.tabs-left .nav-tabs {
  float: left;
  margin-right: 19px;
          border-radius: 4px 0 0 4px;

  -webkit-border-radius: 4px 0 0 4px;
     -moz-border-radius: 4px 0 0 4px;
}
.tabs-left .nav-tabs > li:first-child > a {
          border-radius: 4px 0 0 0;

  -webkit-border-radius: 4px 0 0 0;
     -moz-border-radius: 4px 0 0 0;
}
.tabs-left .nav-tabs > li:last-child > a {
          border-radius: 0 0 0 4px;

  -webkit-border-radius: 0 0 0 4px;
     -moz-border-radius: 0 0 0 4px;
}

.tabs-right .nav-tabs {
  float: right;
  margin-left: 19px;
          border-radius: 0 4px 4px 0;

  -webkit-border-radius: 0 4px 4px 0;
     -moz-border-radius: 0 4px 4px 0;
}
.tabs-right .nav-tabs > li:first-child > a {
          border-radius: 0 4px 0 0;

  -webkit-border-radius: 0 4px 0 0;
     -moz-border-radius: 0 4px 0 0;
}
.tabs-right .nav-tabs > li:last-child > a {
          border-radius: 0 0 4px 0;

  -webkit-border-radius: 0 0 4px 0;
     -moz-border-radius: 0 0 4px 0;
}

/**
 * pill
 * --------------------------------------------------
 */
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
  color: white;
  background-color: #3bafda;
}
.nav-pills > li > a {
  color: #3bafda;
}
.nav-pills > li > a:hover {
  color: #434a54;
  background-color: #e6e9ed;
}
.nav-pills > .active > a > .badge {
  color: #3bafda;
}
.nav-pills .open > a, .nav-pills .open > a:focus, .nav-pills .open > a:hover {
  color: #434a54;
  background-color: #e6e9ed;
}

/**
 * navbar
 * --------------------------------------------------
 */
.navbar-form {
  padding: 0 !important;
}

.navbar-default {
  background-color: #37bc9b;
  border-color: #37bc9b;
}
.navbar-default .navbar-brand, .navbar-default .navbar-link, .navbar-default .btn-link {
  color: #26816a;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus, .navbar-default .navbar-link:hover, .navbar-default .btn-link:hover, .navbar-default .btn-link:focus {
  color: white;
  background-color: transparent;
}
.navbar-default .navbar-text, .navbar-default .navbar-nav > li > a {
  color: #26816a;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: white;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: white;
  background-color: #48cfad;
}
.navbar-default .btn-link[disabled]:hover, fieldset[disabled] .navbar-default .btn-link:hover, .navbar-default .btn-link[disabled]:focus, fieldset[disabled] .navbar-default .btn-link:focus, .navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:hover, .navbar-default .navbar-nav > .disabled > a:focus {
  color: #2e9c81;
  background-color: transparent;
}
.navbar-default .navbar-toggle {
  background-color: #26816a;
  border-color: #26816a;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #2b957a;
  border-color: #2b957a;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #37bc9b;
}
.navbar-default .navbar-collapse, .navbar-default .navbar-form {
  border-color: #48cfad;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: white;
  background-color: #37bc9b;
}
@media (max-width: 767px) {
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background-color: #48cfad;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .divider {
    background-color: #48cfad;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #26816a;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: white;
    background-color: #48cfad;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .dropdown-header {
    color: #26816a;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #2b957a;
  }
}

.navbar-inverse {
  background-color: #333;
  border-color: #333;
}
.navbar-inverse .navbar-brand, .navbar-inverse .navbar-link, .navbar-inverse .btn-link {
  color: #8c8c8c;
}
.navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus, .navbar-inverse .navbar-link:hover, .navbar-inverse .btn-link:hover, .navbar-inverse .btn-link:focus {
  color: white;
  background-color: transparent;
}
.navbar-inverse .navbar-text, .navbar-inverse .navbar-nav > li > a {
  color: #8c8c8c;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
  color: white;
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
  color: white;
  background-color: black;
}
.navbar-inverse .btn-link[disabled]:hover, fieldset[disabled] .navbar-inverse .btn-link:hover, .navbar-inverse .btn-link[disabled]:focus, fieldset[disabled] .navbar-inverse .btn-link:focus, .navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:hover, .navbar-inverse .navbar-nav > .disabled > a:focus {
  color: #666;
  background-color: transparent;
}
.navbar-inverse .navbar-toggle {
  background-color: black;
  border-color: black;
}
.navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus {
  background-color: #1a1a1a;
  border-color: #1a1a1a;
}
.navbar-inverse .navbar-toggle .icon-bar {
  background-color: #8c8c8c;
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
  border-color: black;
}
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
  color: white;
  background-color: black;
}
@media (max-width: 767px) {
  .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    background-color: black;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .divider {
    background-color: black;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
    color: #8c8c8c;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: white;
    background-color: black;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
    color: #bfbfbf;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #666;
  }
}

/**
 * list
 * --------------------------------------------------
 */
.list-group {
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.list-group-item {
  border-color: transparent;
  border-top-color: #e6e9ed;
}
.list-group-item:first-child {
  border-top: none;
}
.list-group-item-heading {
  color: #434a54;
}

a.list-group-item {
  color: #434a54;
}
a.list-group-item .list-group-item-heading {
  font-size: 16px;
  color: #434a54;
}
a.list-group-item:hover, a.list-group-item:focus {
  background-color: #e6e9ed;
}
a.list-group-item.active, a.list-group-item.active:hover, a.list-group-item.active:focus {
  background-color: #4fc1e9;
  border-color: #4fc1e9;
}
a.list-group-item.active .list-group-item-text, a.list-group-item.active:hover .list-group-item-text, a.list-group-item.active:focus .list-group-item-text {
  color: white;
}

.list-group-item-primary {
  color: #22b1e3;
  background-color: #4fc1e9;
  border-color: #3bafda transparent transparent transparent;
}
.list-group-item-primary:first-child {
  border-color: transparent;
}
a.list-group-item-primary {
  color: #126d8d;
}
a.list-group-item-primary:hover, a.list-group-item-primary:focus {
  color: white;
  background-color: #3bafda;
}
a.list-group-item-primary.active, a.list-group-item-primary:hover, a.list-group-item-primary:focus {
  background-color: #3bafda;
  border-color: #4fc1e9 transparent transparent transparent;
}

.list-group-item-success {
  color: #87c940;
  background-color: #a0d468;
  border-color: #8cc152 transparent transparent transparent;
}
.list-group-item-success:first-child {
  border-color: transparent;
}
a.list-group-item-success {
  color: #537f24;
}
a.list-group-item-success:hover, a.list-group-item-success:focus {
  color: white;
  background-color: #8cc152;
}
a.list-group-item-success.active, a.list-group-item-success:hover, a.list-group-item-success:focus {
  background-color: #8cc152;
  border-color: #a0d468 transparent transparent transparent;
}

.list-group-item-warning {
  color: #ffbf21;
  background-color: #ffce54;
  border-color: #f6bb42 transparent transparent transparent;
}
.list-group-item-warning:first-child {
  border-color: transparent;
}
a.list-group-item-warning {
  color: #876000;
}
a.list-group-item-warning:hover, a.list-group-item-warning:focus {
  color: white;
  background-color: #f6bb42;
}
a.list-group-item-warning.active, a.list-group-item-warning:hover, a.list-group-item-warning:focus {
  background-color: #f6bb42;
  border-color: #ffce54 transparent transparent transparent;
}

.list-group-item-info {
  color: #2fb593;
  background-color: #48cfad;
  border-color: #37bc9b transparent transparent transparent;
}
.list-group-item-info:first-child {
  border-color: transparent;
}
a.list-group-item-info {
  color: #1a6451;
}
a.list-group-item-info:hover, a.list-group-item-info:focus {
  color: white;
  background-color: #37bc9b;
}
a.list-group-item-info.active, a.list-group-item-info:hover, a.list-group-item-info:focus {
  background-color: #37bc9b;
  border-color: #48cfad transparent transparent transparent;
}

.list-group-item-danger {
  color: #e8273b;
  background-color: #ed5565;
  border-color: #da4453 transparent transparent transparent;
}
.list-group-item-danger:first-child {
  border-color: transparent;
}
a.list-group-item-danger {
  color: #99101f;
}
a.list-group-item-danger:hover, a.list-group-item-danger:focus {
  color: white;
  background-color: #da4453;
}
a.list-group-item-danger.active, a.list-group-item-danger:hover, a.list-group-item-danger:focus {
  background-color: #da4453;
  border-color: #ed5565 transparent transparent transparent;
}

/**
 * media list
 * --------------------------------------------------
 */
.media-list {
  color: #aab2bd;
}
.media-heading {
  font-size: 14px;
  color: #434a54;
}

/**
 * modal
 * --------------------------------------------------
 */
.modal-content {
  color: #434a54;
  border: none;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.modal-header {
  border-bottom: none;
}
.modal-body {
  padding: 0 15px;
}
.modal-footer {
  border-top: none;
}

/**
 * well
 * --------------------------------------------------
 */
.well {
  padding: 10px;
  color: #434a54;
  background-color: white;
  border: none;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.well blockquote {
  border-color: #ccd1d9;
}
.well-lg {
  padding: 20px;
}
.well-sm {
  padding: 5px;
}

/**
 * thumbnail
 * --------------------------------------------------
 */
.thumbnail {
  border: none;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
}
.thumbnail a > img, .thumbnail > img {
  width: 100%;
}
.thumbnail .caption {
  font-size: 14px;
}
.thumbnail .caption h1, .thumbnail .caption h2, .thumbnail .caption h3, .thumbnail .caption h4, .thumbnail .caption h5, .thumbnail .caption h6 {
  margin: 5px 0 10px;
  font-size: 16px;
}

/**
 * jumbotron
 * --------------------------------------------------
 */
.jumbotron {
  padding: 0;
  margin-bottom: 20px;
  background-color: white;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.container .jumbotron {
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.jumbotron > .jumbotron-photo img {
  width: 100%;
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.jumbotron .jumbotron-contents {
  padding: 20px;
  color: #434a54;
}
.jumbotron .carousel, .jumbotron .carousel-inner, .jumbotron .carousel-inner > .item.active img {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.jumbotron .carousel-inner > .item > a > img,
.jumbotron .carousel-inner > .item > img {
  width: 100%;
}
.jumbotron .carousel-control.left {
          border-radius: 4px 0 0 0;

  -webkit-border-radius: 4px 0 0 0;
     -moz-border-radius: 4px 0 0 0;
}
.jumbotron .carousel-control.right {
          border-radius: 0 4px 0 0;

  -webkit-border-radius: 0 4px 0 0;
     -moz-border-radius: 0 4px 0 0;
}
.jumbotron h1, .jumbotron .h1, .jumbotron h2, .jumbotron .h2 {
  font-weight: 400;
}
.jumbotron h1, .jumbotron .h1 {
  font-size: 28px;
}
.jumbotron h2, .jumbotron .h2 {
  font-size: 24px;
}
.jumbotron p {
  font-size: 14px;
}
@media screen and (min-width: 768px) {
  .jumbotron, .container .jumbotron {
    padding: 0;
  }
  .jumbotron h1, .jumbotron .h1 {
    font-size: 28px;
  }
}

/**
 * panel
 * --------------------------------------------------
 */
.panel {
  background-color: white;
  border: none;
          border-radius: 4px;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.panel .list-group {
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;
}
.panel .list-group-item:first-child {
  border-top: 1px solid #e6e9ed;
}
.panel-heading {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.panel-title {
  font-size: 14px;
  font-weight: normal;
  color: #434a54;
}
.panel-footer {
  background-color: #e6e9ed;
  border-top-color: #e6e9ed;
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.panel-default {
  border-color: #e6e9ed;
}
.panel-default > .panel-heading {
  color: #434a54;
  background-color: #e6e9ed;
  border-color: #e6e9ed;
}
.panel-primary {
  border-color: #3bafda;
}
.panel-primary > .panel-heading {
  color: white;
  background-color: #3bafda;
  border-color: #3bafda;
}
.panel-success {
  border-color: #8cc152;
}
.panel-success > .panel-heading {
  color: white;
  background-color: #8cc152;
  border-color: #8cc152;
}
.panel-info {
  border-color: #37bc9b;
}
.panel-info > .panel-heading {
  color: white;
  background-color: #37bc9b;
  border-color: #37bc9b;
}
.panel-warning {
  border-color: #f6bb42;
}
.panel-warning > .panel-heading {
  color: white;
  background-color: #f6bb42;
  border-color: #f6bb42;
}
.panel-danger {
  border-color: #da4453;
}
.panel-danger > .panel-heading {
  color: white;
  background-color: #da4453;
  border-color: #da4453;
}
.panel-primary > .panel-heading > .panel-title, .panel-success > .panel-heading > .panel-title, .panel-info > .panel-heading > .panel-title, .panel-warning > .panel-heading > .panel-title, .panel-danger > .panel-heading > .panel-title {
  color: white;
}
.panel > .list-group:first-child .list-group-item:first-child, .panel > .table:first-child, .panel > .table-responsive:first-child > .table:first-child {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.panel > .list-group:last-child .list-group-item:last-child {
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table:first-child > thead:first-child > tr:first-child th:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
          border-radius: 4px 0 0 0;

  -webkit-border-radius: 4px 0 0 0;
     -moz-border-radius: 4px 0 0 0;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table:first-child > thead:first-child > tr:first-child th:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:last-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
          border-radius: 0 4px 0 0;

  -webkit-border-radius: 0 4px 0 0;
     -moz-border-radius: 0 4px 0 0;
}
.panel > .table:last-child, .panel > .table-responsive:last-child > .table:last-child {
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
          border-radius: 0 0 0 4px;

  -webkit-border-radius: 0 0 0 4px;
     -moz-border-radius: 0 0 0 4px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
          border-radius: 0 0 4px 0;

  -webkit-border-radius: 0 0 4px 0;
     -moz-border-radius: 0 0 4px 0;
}
.panel > .panel-body + .table, .panel > .panel-body + .table-responsive {
  border-top-color: #e6e9ed;
}

/**
 * accordion
 * --------------------------------------------------
 */
.panel-group .panel {
  background-color: transparent;
          border-radius: 0;
  -webkit-box-shadow: none;
     -moz-box-shadow: none;
          box-shadow: none;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
}
.panel-group .panel + .panel {
  margin-top: 0;
}
.panel-group .panel-heading {
  padding: 0;
  border-bottom-color: transparent;
}
.panel-group .panel-heading + .panel-collapse .panel-body {
  padding: 15px 0;
  border-top-color: transparent;
}
.panel-group .panel-title a {
  display: block;
  padding: 10px 0;
}

.panel-group-lists .panel {
  background-color: white;
  border-bottom: 1px solid #e6e9ed;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
     -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
          box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
}
.panel-group-lists .panel:first-child {
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}
.panel-group-lists .panel:last-child {
  border-bottom: none;
          border-radius: 0 0 4px 4px;

  -webkit-border-radius: 0 0 4px 4px;
     -moz-border-radius: 0 0 4px 4px;
}
.panel-group-lists .panel-heading + .panel-collapse .panel-body {
  padding: 15px;
  border-top-color: #e6e9ed;
}
.panel-group-lists .panel-title a {
  padding: 10px 15px;
  color: #434a54;
}
.panel-group-lists .panel-title a:hover, .panel-group-lists .panel-title a:focus, .panel-group-lists .panel-title a:active {
  color: #aab2bd;
}

/**
 * footer
 * --------------------------------------------------
 */
.footer {
  padding: 40px 0;
  background-color: #434a54;
}
.footer-logo, .footer-nav {
  float: left;
  width: 20%;
  padding: 0 20px;
}
@media (max-width: 768px) {
  .footer-logo {
    margin-bottom: 20px;
  }
  .footer-logo, .footer-nav {
    display: block;
    float: none;
    width: 100%;
  }
}
.footer-logo {
  height: 32px;
  margin-top: -5px;
  line-height: 32px;
}
.footer-logo img {
  margin-right: 10px;
}
.footer-logo a {
  font-size: 20px;
  font-weight: bold;
  color: white;
}
.footer-logo a:hover, .footer-logo a:active {
  text-decoration: none;
}
.footer-nav .nav-title {
  margin-bottom: 15px;
  color: #e6e9ed;
}
.footer-nav .nav-item {
  line-height: 28px;
}
.footer-nav .nav-item > a {
  color: #aab2bd;
}
.footer-nav .nav-item > a:hover, .footer-nav .nav-item > a:active {
  color: #ccd1d9;
  text-decoration: none;
}
.footer-copyright {
  color: #aab2bd;
}

/**
 * timeline
 * --------------------------------------------------
 */
.timeline dl {
  position: relative;
  top: 0;
  padding: 20px 0;
  margin: 0;
}
.timeline dl:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 50%;
  z-index: 100;
  width: 2px;
  margin-left: -1px;
  content: '';
  background-color: #ccd1d9;
}
.timeline dl dt {
  position: relative;
  top: 30px;
  z-index: 200;
  width: 120px;
  padding: 3px 5px;
  margin: 0 auto 30px;
  font-weight: normal;
  color: white;
  text-align: center;
  background-color: #aab2bd;
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.timeline dl dd {
  position: relative;
  z-index: 200;
}
.timeline dl dd .circ {
  position: absolute;
  top: 40px;
  left: 50%;
  z-index: 200;
  width: 22px;
  height: 22px;
  margin-left: -11px;
  background-color: #4fc1e9;
  border: 4px solid #f5f7fa;
          border-radius: 50%;

  -webkit-border-radius: 50%;
     -moz-border-radius: 50%;
}
.timeline dl dd .time {
  position: absolute;
  top: 31px;
  left: 50%;
  display: inline-block;
  width: 100px;
  padding: 10px 20px;
  color: #4fc1e9;
}
.timeline dl dd .events {
  position: relative;
  width: 47%;
  padding: 10px 10px 0;
  margin-top: 31px;
  background-color: white;
          border-radius: 4px;

  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
}
.timeline dl dd .events:before {
  position: absolute;
  top: 12px;
  width: 0;
  height: 0;
  content: '';
  border-style: solid;
  border-width: 6px;
}
.timeline dl dd .events .events-object {
  margin-right: 10px;
}
.timeline dl dd .events .events-body {
  overflow: hidden;
  zoom: 1;
}
.timeline dl dd .events .events-body .events-heading {
  margin: 0 0 10px;
  font-size: 14px;
}
.timeline dl dd.pos-right .time {
  margin-left: -100px;
  text-align: right;
}
.timeline dl dd.pos-right .events {
  float: right;
}
.timeline dl dd.pos-right .events:before {
  left: -12px;
  border-color: transparent white transparent transparent;
}
.timeline dl dd.pos-left .time {
  margin-left: 0;
  text-align: left;
}
.timeline dl dd.pos-left .events {
  float: left;
}
.timeline dl dd.pos-left .events:before {
  right: -12px;
  border-color: transparent transparent transparent white;
}

@media screen and (max-width: 767px) {
  .timeline dl:before {
    left: 60px;
  }
  .timeline dl dt {
    margin: 0 0 30px;
  }
  .timeline dl dd .circ {
    left: 60px;
  }
  .timeline dl dd .time {
    left: 0;
  }
  .timeline dl dd.pos-left .time {
    padding: 10px 0;
    margin-left: 0;
    text-align: left;
  }
  .timeline dl dd.pos-left .events {
    float: right;
    width: 84%;
  }
  .timeline dl dd.pos-left .events:before {
    left: -12px;
    border-color: transparent white transparent transparent;
  }
  .timeline dl dd.pos-right .time {
    padding: 10px 0;
    margin-left: 0;
    text-align: left;
  }
  .timeline dl dd.pos-right .events {
    float: right;
    width: 84%;
  }
}
/**
 * dropdown-menu
 * --------------------------------------------------
 */
.dropdown-menu {
  background-color: #434a54;
  border: none;
}
.dropdown-menu .dropdown-header {
  padding: 5px 20px;
  font-size: 14px;
  font-weight: 700;
  color: #aab2bd;
}
.dropdown-menu li a {
  padding: 5px 20px;
  color: white;
}
.dropdown-menu li a:hover, .dropdown-menu li a:focus, .dropdown-menu .active a, .dropdown-menu .active a:hover, .dropdown-menu .active a:focus {
  color: white;
  background-color: #656d78;
  outline: none;
}
.dropdown-menu .disabled a, .dropdown-menu .disabled a:hover, .dropdown-menu .disabled a:focus {
  color: #656d78;
  cursor: default;
}
.dropdown-menu .divider {
  background-color: #656d78;
  border-bottom: none;
}
.dropup .dropdown-menu {
  margin-bottom: 0;
          border-radius: 4px 4px 0 0;

  -webkit-border-radius: 4px 4px 0 0;
     -moz-border-radius: 4px 4px 0 0;
}

/**
 * dropdown-submenu
 * --------------------------------------------------
 */
.dropdown-submenu {
  position: relative;
}
.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
          border-radius: 0 4px 4px 4px;

  -webkit-border-radius: 0 4px 4px 4px;
     -moz-border-radius: 0 4px 4px 4px;
}
.dropdown-submenu:hover .dropdown-menu {
  display: block;
}
.dropup .dropdown-submenu .dropdown-menu {
  top: auto;
  bottom: 0;
  margin-top: 0;
  margin-bottom: -2px;
          border-radius: 4px 4px 4px 0;

  -webkit-border-radius: 4px 4px 4px 0;
     -moz-border-radius: 4px 4px 4px 0;
}
.dropdown-submenu > a:after {
  display: block;
  float: right;
  width: 0;
  height: 0;
  margin-top: 5px;
  margin-right: -10px;
  content: " ";
  border-color: transparent;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  border-left-color: white;
}
.dropdown-default .dropdown-submenu > a:after {
  border-left-color: #434a54;
}
.dropdown-submenu:hover a:after {
  border-left-color: white;
}
.dropdown-submenu.pull-left {
  float: none;
}
.dropdown-submenu.pull-left .dropdown-menu {
  left: -100%;
  margin-left: 10px;
          border-radius: 4px 0 4px 4px;

  -webkit-border-radius: 4px 0 4px 4px;
     -moz-border-radius: 4px 0 4px 4px;
}

/*# sourceMappingURL=bootflat.css.map */
