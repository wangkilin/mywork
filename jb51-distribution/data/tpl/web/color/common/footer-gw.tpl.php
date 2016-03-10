<?php defined('IN_IA') or exit('Access Denied');?>			</div>
        </div></div>
        </div>

		<script type="text/javascript">
			require(['bootstrap']);
			<?php  if($_W['isfounder'] && !defined('IN_MESSAGE')) { ?>
			function checkupgrade() {
				require(['util'], function(util) {
					if (util.cookie.get('checkupgrade_sys')) {
						return;
					}
						}
					});
				});
			}

			function checkupgrade_hide() {
				require(['util'], function(util) {
					util.cookie.set('checkupgrade_sys', 1, 3600);
					$('#upgrade-tips').hide();
				});
			}
			$(function(){
				checkupgrade();
			});
			<?php  } ?>

            <?php  if($_W['uid']) { ?>
                function checknotice() {
                    $.post("<?php  echo url('utility/notice')?>", {}, function(data){
                        var data = $.parseJSON(data);
                        $('#notice-container').html(data.notices);
                        $('#notice-total').html(data.total);
                        
                        setTimeout(checknotice, 60000);
                    });
                }
                checknotice();
            <?php  } ?>
		</script>
</main>

            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right xright">
                    <?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by v<?php echo IMS_VERSION;?> &copy; 2014-2015 <?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?>
                </div>
                <div class="pull-left xleft">
                    <?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?><?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?>&nbsp; &nbsp; <?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
                </div>
            </footer>

        </div>
<script src="./resource/color/js/commonp.js"></script>
 </body>
</html>