$(document).ready(function() {
  $('.navbar-toggler').click(function() {
    let sidebar = $('.sidebar');
    let main = $('.main');
    if (sidebar.hasClass('d-none')) {
      // jika di akan dimunculkan
      sidebar.removeClass('d-none col-lg-3 col-xxl-2').addClass('d-block col-6 col-md-4 d-lg-none');
      main.removeClass('col-12 col-md-12 col-lg-9 col-xxl-10').addClass('col-6 col-md-8 col-lg-12 col-xxl-12');
    } else {
      // jika akan di hilangkan
      sidebar.removeClass('d-block col-6 col-md-4 d-lg-none').addClass('d-none d-lg-block col-lg-3 col-xxl-2');
      main.removeClass('col-6 col-md-6 col-lg-12 col-xxl-12').addClass('col-12 col-md-12 col-lg-9 col-xxl-10');
    }
  });

  $('.navbar-brand').click(function() {
    let accountDropdown = $('.account-dropdown');
    let navbarBrand = $('.navbar-brand');
    if(accountDropdown.hasClass('d-none')) {
      accountDropdown.removeClass('d-none').addClass('d-block');
      navbarBrand.removeClass('bg-template-blue-1').addClass('bg-template-blue-2');
    } else {
      accountDropdown.removeClass('d-block').addClass('d-none');
      navbarBrand.removeClass('bg-template-blue-2').addClass('bg-template-blue-1');
    }
  })

  $('.nav-link-dropdown').click(function() {
    let navLinkDropdown = $('.nav-link-dropdown');
    let navLinkDropdownContent = $('.nav-link-dropdown-content');
    if(navLinkDropdownContent.hasClass('d-none')) {
      navLinkDropdown.addClass('active bg-dark');
      navLinkDropdownContent.removeClass('d-none').addClass('active');
    } else {
      navLinkDropdown.removeClass('active bg-dark');
      navLinkDropdownContent.removeClass('active').addClass('d-none');
    }
  })
});

$(window).on('load', function() {
  let navLinkDropdown = $('.nav-link-dropdown');
  let navLinkDropdownContent = $('.nav-link-dropdown-content');
  if (navLinkDropdown.hasClass('active')) {
    navLinkDropdownContent.removeClass('d-none');
  }
});

$(document).ready(function() {
  $("#datePickerButtonAwal").click(function() {
      $("#datePickerInputAwal").datepicker("show");
  });

  $("#datePickerInputAwal").datepicker({
      dateFormat: "yy-mm-dd"
  });

  $("#datePickerButtonAkhir").click(function() {
      $("#datePickerInputAkhir").datepicker("show");
  });

  $("#datePickerInputAkhir").datepicker({
      dateFormat: "yy-mm-dd"
  });
});

$(document).ready(function() {
  $("#simpanTransaksiPenjualanButton").click(function() {
      $("#simpanTransaksiPenjualan").click();
  });
});


