jQuery(function() {
    jQuery('#example').DataTable();


// Create Post ~~~~~~~~~~~~~~~~~~~~
    jQuery('#frmCreateNewWpPost').on("submit", function(){
    	
    	jQuery.post(ajaxurl+"/api/get_nonce/?controller=posts&method=create_post", function(response){
    		var nonce = response.nonce;
    		var frmdata = "nonce="+nonce+"&"+jQuery("#frmCreateNewWpPost").serialize()+"&status=publish";
    		console.log(frmdata);
    		jQuery.post(ajaxurl+"/api/posts/create_post/", frmdata, function(response){
    			alert('Post has been submited');
    			setTimeout(function(){
    				location.reload();
    			}, 1000);
    		})
    	})
    })


 // Delete Post ~~~~~~~~~~~~~~~~~~~~~~~  
    jQuery(document).on("click", ".post-delete", function(){
        var dataid = jQuery(this).attr("data-id");
        var conf = confirm("Are your want to delete from list ?")
        if(conf){ // Getting true value in clicking event
                jQuery.post(ajaxurl+"/api/get_nonce/?controller=posts&method=delete_post", function(response){
                var nonce = response.nonce;
                var postdata = "id=" + dataid + "&nonce=" + nonce;
                jQuery.post(ajaxurl + "/api/posts/delete_post/", postdata, function(response){
                    //console.log(response);
                    alert("Your post has been deleted");
                    setTimeout(function(){
                        location.reload();
                    }, 900);
                });            
            }) ; 
        }    	
    });

 // Edit Post ~~~~~~~~~~~~~~~~~~~~~~~
 jQuery(document).on("click", ".post-edit", function(){
    var title = jQuery(this).parents("tr").find("td:nth(1)").text();
    var content = jQuery(this).parents("tr").find("td:nth(2)").text();
    jQuery( "#postEdit #title_edit" ).val(title);
    jQuery( "#postEdit #content_edit" ).val(content);
    jQuery( "#post-id" ).val(jQuery(this).attr("data-id"));
    

    jQuery("#frmEditPost").on("submit", function (){
        var frmdata = jquery(this).serialize();
        var nonce_param = "contoller=posts&method=update_post";
        jQuery.post(ajaxurl + "/api/get_nonce/", nonce_param, function (response){
            var nonce = response.nonce;
            frmdata += "&nonce=" + nonce;
            console.log(frmdata);
            jQuery.post(ajaxurl + "/api/posts/update_post/", frmdata, function (response) {
                setTimeout(function(){
                    location.reload();
                },1200);
            });
        })
    })


        

    // console.log(description);
    // console.log(title);
 });

// List Post ~~~~~~~~~~~~~~~~~~~~~~~
    load_wp_post();

} );

// List Post Function ~~~~~~~~~~~~
function load_wp_post(){
	jQuery.post(ajaxurl+"/api/get_posts/", function(response){
		var posts = response.posts;
		var html = " ";
		jQuery.each(posts,function(index, post){
			html += ' <tr><td>'+(index+1)+'</td><td>'+post.title+'</td><td>'+post.content+'</td><td>'+post.slug+'</td><td>Published</td><td><a class="btn btn-info post-edit" href="javascript:void(0)" data-toggle="modal" data-target="#postEdit" data-id="'+post.id+'">Edit</a><a class="btn btn-danger post-delete" href="javascript:void(0)" data-id="'+post.id+'">Delete</a></td></tr> ';
		})
		jQuery("#table-data").html(html);
	})
}