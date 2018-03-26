jQuery.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};
jQuery(document).ready( function(a) {
 
        function c(a) {
            return a.offsetParent ? a.offsetTop + c(a.offsetParent) : a.offsetTop
        }

        function b() {
            var a = window.innerHeight || document.body.clientHeight || document.documentElement.clientHeight,
                a = a - (c(document.getElementById("creativeto_iframe")) + d),
                a = 0 > a ? 0 : a;
            document.getElementById("creativeto_iframe").style.height = a + "px"
        }
        var d = 10;
        a(document).ready(function () {
                a("#configure-forms").change(function () {
                        a("#creativeto_contact_forms").submit()
                    });
                0 < a("#creativeto_iframe").length && b();
                a("#export-file").click(function () {
                        a("[name=creativeto-action]").val("export-file")
                    });
                a("#import-file").change(function () {
                        a("[name=creativeto-action]").val("import-file")
                    });
                a("#configuration-name").focus(function () {
                        a("[name=creativeto-action]").val("configuration-save")
                    });
                a("#configuration-restore, #configuration-restore-save").bind("click change", function () {
                        a("[name=creativeto-action]").val("configuration-restore")
                    });
                a(".configuration-remove-item").click(function (b) {
                        b.preventDefault();
                        a("[name=creativeto-action]").val("configuration-remove");
                        a("#configuration-remove").val(a(this).attr("rel"));
                        a(this).parents("form").submit()
                    })
                a(".radio_label_with_images img").each(function(){
                        a(this).click(function(){
                                a(this).parent().parent().find('.selected').each(function(){
                                        a(this).removeClass("selected");
                                })
                                a(this).addClass("selected");					
                        });
                });
                a(".radio_input_with_images").each(function(){
                        //a(this).next('label').find("img").addClass("not_selected");
                       // alert(a(this).is(":checked"));
                    if( a(this).is(":checked") ){
                        //a(this).next('label').find("img").addClass("selected");
                        a("#label_"+a(this).attr('id')+" img").addClass("selected");
                    }						
                });
            });
        a(window).resize(function (d) {
                0 < a("#creativeto_iframe").length && b(d);
            });
//////////////////////////////////////////////////////////////////////////////////////////
        var c = function () {};
        openTab = function (b) {
			
            var hash = b.hash;
            window.location.hash = hash;
            
            if (!a(b).parent().hasClass("active")) {
                hideTabs();
                openMenu(b);
                var d = a(b).attr("href");
                a(d).fadeIn();
                a(b).parent().addClass("active")
            }
            0 < a(b).parents(".creativeto-rightmenu").length && (d = a(b).attr("href"), a(b).parents(".creativeto-menu-top").find("a[href=" + d + "]").parent().addClass("active"))
        };
        hideTabs = function () {
            a(".creativeto-box").hide()
        };
        openMenu = function (b) {
            a("#creativeto-adminmenuwrap li.active").removeClass("active");
            if (a(b).parents(".creativeto-menu-top").hasClass("open")) return !1;
            a("#creativeto-adminmenuwrap li.creativeto-menu-top").removeClass("open").removeClass("current");
            a("#creativeto-adminmenuwrap .creativeto-submenu.open").removeClass("open").slideUp().parent().removeClass("current");
            a(b).parents(".creativeto-menu-top").addClass("open").addClass("current").find(".creativeto-submenu").slideDown().addClass("open")
        };
        createRightMenus = function () {
            a("#creativeto-adminmenuwrap li.creativeto-has-submenu").each(function () {
                    a(this).hover(function () {
                            0 == a(this).find(".creativeto-rightmenu").length && a("<div/>", {
                                    "class": "creativeto-rightmenu"
                                }).html("<ul>" +
                                a(this).find(".creativeto-submenu").html() + "</ul>").appendTo(a(this))
                        })
                })
        };
        dependencies_handler = function (a, d, e) {
            if ("function" != typeof c) var c = jQuery;
            var f = !0;
            if ("string" == typeof d) {
                ":radio" == d.substr(0, 6) && (d += ":checked");
                e = e.split(",");
                for (var g = 0; g < e.length; g++) if (c(d).val() != e[g]) f = !1;
                    else {
                        f = !0;
                        break
                    }
            }
            f ? c(a + "-container").show() : c(a + "-container").hide()
        };
        c.prototype = {
            init: function () {
                hideTabs();
                createRightMenus();
                a("#creativeto-adminmenuwrap li.creativeto-menu-top a").live("click", function (b) {
                        b.preventDefault();
						//alert(window.location.hash);
                        a(this).parent().hasClass("creativeto-has-submenu") ?
                            a(this).parent().hasClass("open") || a(this).parent().find("li:first a").click() : openTab(this);
                        b = a(this).attr("href");
                        a(b).find(".upload_img_preview img").each(function () {
                                var b = a(this).attr("src"),
                                    c = a(this).attr("data-src");
                                b.indexOf("sleep.png") && a(this).attr("src", c)
                            })
                    });
				var hash_href = window.location.hash;
				a("#creativeto-adminmenuwrap li.creativeto-menu-top a").each(function(){
					if( a(this).attr('href') === hash_href ) { a(this).click(); }
				});
                                if(hash_href === '' ) { 
                                    a("#creativeto-adminmenuwrap li.creativeto-menu-top a").filter(":first").click(); 
                                }
				/*
                a("#creativeto-adminmenuwrap li.creativeto-menu-top a").live("click", function (b) {
                        b.preventDefault();
                        a(this).parent().hasClass("creativeto-has-submenu") ?
                            a(this).parent().hasClass("open") || a(this).parent().find("li:first a").click() : openTab(this);
                        b = a(this).attr("href");
                        a(b).find(".upload_img_preview img").each(function () {
                                var b = a(this).attr("src"),
                                    c = a(this).attr("data-src");
                                b.indexOf("sleep.png") && a(this).attr("src", c)
                            })
                    }).filter(":first").click();
				*/
                a("[data-field]").each(function () {
                        var b = a(this),
                            d = "#" + b.data("field"),
                            c = "#" + b.data("dep"),
                            h = b.data("value");
                        a(c).on("change", function () {
                                dependencies_handler(d, c, h.toString());
                            }).change();
                    });
            }
        };
        a(function () {
                c = new c;
                c.init();
            });
    });