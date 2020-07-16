
    <footer class="footer footer-static footer-dark">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; {{date('Y')}} <a class="text-bold-800 grey darken-2" href="http://raitotec.com/" target="_blank"> Raitotec </a>, All rights reserved. </span></p>
      </footer>
  
     <script type="text/javascript">

        var change = @json( __('Change-Password') );
        var password = @json( __('Password') );
        var PasswordC = @json( __('Password Confirmation') );
        var Passwordg = @json( __('Generate Password') );
        var country = @json( __('Select Country') );
        var Slots = @json( __('Slots') );
        var service = @json( __('Service') );
        var product = @json( __('Product') );
        var active = @json( __('Active') );
        var unactive = @json( __('Un Active') );
        var All = @json( __('All') );
        var selectpackage = @json( __('Select package') );
        var SelectFrequencies = @json( __('Select Frequencies') );
        var Daily = @json( __('Daily') );
        var Weekly = @json( __('Weekly') );
        var Monthly = @json( __('Monthly') );
        var QuarterlyYearly = @json( __('Quarterly-Yearly') );
        var HalfYearly = @json( __('Half-Yearly') );
        var Yearly = @json( __('Yearly') );
        var nopackage = @json( __('No Found Package') );
        var billnotpaid = @json( __('The bill has not been paid') );
        var suredeleteslot = @json( __('are you sureto delete this slots?') );
        var suredeleteslot = @json( __('are you sureto delete this slots?') );
        var atleastslot = @json( __('please select atleast on slot') );
        var gym = @json( __('GYM') );
        var spa = @json( __('SPA') );
        var beatycenter = @json( __('Beaty Center') );
        var choosecomponent = @json( __('Choose Component') );
        var other = @json( __('Other') );
       


        var add_users               = {{(permission::check('add','users'))?permission::check('add','users'):0}};
        var edit_users               = {{(permission::check('edit','users'))?permission::check('edit','users'):0}};
        var view_users               = {{(permission::check('view','users'))?permission::check('view','users'):0}};
        var delete_users             = {{(permission::check('delet','users'))?permission::check('delet','users'):0}};
        var view_permission          = {{(permission::check('prev','users'))?permission::check('prev','users'):0}};

        var add_tickets                 = {{(permission::check('add','slots'))?permission::check('add','slots'):0}};
        var edit_tickets                = {{(permission::check('edit','tickets'))?permission::check('edit','tickets'):0}};
        var view_tickets                = {{(permission::check('view','tickets'))?permission::check('view','tickets'):0}};
        var delete_tickets              = {{(permission::check('delet','tickets'))?permission::check('delet','tickets'):0}};
        //var Passwordg = @json( __('Show') );
        //console.log(change);
        </script>
      <!-- BEGIN VENDOR JS-->
      <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
      <!-- BEGIN VENDOR JS-->
      <!-- BEGIN PAGE VENDOR JS-->
      <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
      <script src=" {{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>
      <!-- END PAGE VENDOR JS-->
      <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
      <!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po"></script>-->
      <script src="{{asset('app-assets/vendors/js/charts/gmaps.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/extensions/jquery.knob.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/charts/raphael-min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
      <script src="{{asset('app-assets/vendors/js/charts/echarts/echarts.js')}}"></script>
      <!-- END PAGE VENDOR JS-->
      <!-- BEGIN ROBUST JS-->
      <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
      <script src="{{asset('app-assets/js/core/app.js')}}"></script>
      <!-- END ROBUST JS-->
      <!-- BEGIN PAGE LEVEL JS-->
      <script src="{{asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

      <script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
      {{-- <script type="text/javascript">
        $(document).ready(function() {
            $(*).dataTable( {
                "language": {
                   "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                   "sLoadingRecords": "جارٍ التحميل...",
                   "sProcessing":   "جارٍ التحميل...",
                   "sLengthMenu":   "أظهر _MENU_ مدخلات",
                   "sZeroRecords":  "لم يعثر على أية سجلات",
                   "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                   "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                   "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                   "sInfoPostFix":  "",
                   "sSearch":       "ابحث:",
                   "sUrl":          "",
                   "oPaginate": {
                       "sFirst":    "الأول",
                       "sPrevious": "السابق",
                       "sNext":     "التالي",
                       "sLast":     "الأخير"
                   },
                   "oAria": {
                       "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                       "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                   }

                }
            } );
        } );
    </script> --}}
      <script src="{{asset('app-assets/js/scripts/pages/dashboard-fitness.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/forms/switch.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/forms/form-repeater.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/bootstrap-clockpicker.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/custom.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/ui/jquery-ui/autocomplete.js')}}"></script>
      <script src="{{asset('app-assets/js/scripts/navs/navs.js')}}"></script>
      <!-- END PAGE LEVEL JS-->

    </body>
  </html>
