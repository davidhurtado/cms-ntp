
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0').alert();
kvInitPlugin(jQuery('#items').kvSelector(), function(){
  if (jQuery('#items').data('select2')) { jQuery('#items').select2('destroy'); }
  jQuery.when(jQuery('#items').select2(select2_50f2809b)).done(initS2Loading('items','s2options_c4acac00'));

});

jQuery('#w1').yiiActiveForm([], []);
});</script>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>