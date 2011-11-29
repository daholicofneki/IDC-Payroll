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


function addcomma(str)
{
       nstr = '';
       str = ''+str+'';
       minus = '';
       flootstr = '';
       if(str.charAt(0) == '-'){
       minus = '-';
       str = str.substring(1);
       }
       if(str.indexOf('.') > -1){
       flootstr = str.substring(str.indexOf('.'));
       str = str.substring(0,str.indexOf('.'));
       }
       if(str.length < 4)
       return (minus + str + flootstr);
       
       c = str.length%3;
       
       for(ci=0;ci<str.length;ci++){
       if((ci % 3) == c && ci != 0)
       nstr += ',';
       
       nstr += str.charAt(ci);
       }
       return (minus + nstr + flootstr);
}