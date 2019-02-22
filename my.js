
jQuery(document).ready(function () {
    jQuery('[data-slug="blogvault_main"]').before('<div class="tooltip"> <div class="right"> <div class="text-content"> <h4>Welcome in Blogvault Use Premium For more options</h4> <span id="close"     onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;"><button type="button">Close!</button></span> </div> </div> </div> ');
});
