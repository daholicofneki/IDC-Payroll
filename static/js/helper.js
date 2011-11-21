 function ajax_link (url,target){
        $.ajax({
            type	: 'GET',
            url		: url,
            cache	: true,
            async	: true,
            beforeSend	: function(){ show_loading();},
            success	: function(data){$(target).replaceWith(data);},
            complete	: function(XMLHttpReq, textStatus){hide_loading(XMLHttpReq, textStatus);},
            error       : function (){alert("Error calling ajax");hide_load();}
        });
                
        return false;
}
