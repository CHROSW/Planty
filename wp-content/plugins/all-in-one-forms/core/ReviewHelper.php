<?php
/**
 * Created by PhpStorm.
 * User: Edgar
 * Date: 2/21/2018
 * Time: 11:55 AM
 */

namespace rednaoeasycalculationforms\core;



class ReviewHelper
{
    private $thresholds=array(20,50,100);
    private $stages=array(
        array(
            'Threshold'=>50,
            'content'=>"Hello!, you have created <strong>%s orders</strong> using custom fields, that's Great! Could you do me a BIG favor and give it a
                                                5-star rating on WordPress? Good reviews really help to spread the word and keep me motivated to continuing maintaining and improving the plugin =)",
            'Reviewlink'=>'Sure, keep up the good work',
            'Remindmelink'=>'Nope, maybe later',
            'DontShowAgain'=>'I already did'

        ),
        array(
            'Threshold'=>100,
            'content'=>"Hello! Its me again =), you have generated <strong>%s orders</strong> using custom fields, so i was wondering, would you have time to 5 star review the plugin really quick? I know you are busy and i don't like to bother you but reviewing the plugin is really important
and ensure the continuation of its development.",
            'Reviewlink'=>'Sure, i will review the plugin really quick',
            'Remindmelink'=>'Sorry but i am not ready yet, maybe later',
            'DontShowAgain'=>'I already did'
        ),
        array(
            'Threshold'=>200,
            'content'=>"Hello! sorry to bother you again (this is the last time i do it), i just wanted to tell you that you have generated <strong>%s orders</strong> using custom fields which is amazing. Could you please help me and 5-star review the plugin? it will take you less than 1 minutes and will 
greatly help me promote and keep growing this plugin that i love and i hope it has been useful for you.",
            'Reviewlink'=>'Alright, i will review the plugin quickly',
            'DontShowAgain'=>'I don\'t want to review it =('
        )
    );

    /** @var Loader */
    public $Loader;
    public function __construct($loader)
    {
        $this->currentStage=null;
        $this->Loader=$loader;
    }


    private $currentStage;
    private $count=0;
    public function Start()
    {
        if($this->GetCurrentStage()==null)
            return;

        $this->PrintNotice();

    }

    private function GetCurrentStage()
    {
        global $wpdb;
        $count=$wpdb->get_var('select count(*) from '.$this->Loader->RECORDS_TABLE);

        if($count<=50)
            return null;


        return 1;
    }



    private function GetContent()
    {
        return sprintf($this->currentStage['content'],$this->count);


    }

    private function PrintNotice()
    {
        ?>
        <style type="text/css">
            .sfReviewButton{
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
                color: #fff;
                background-color: #5bc0de;
                border-color: #46b8da;
                text-decoration: none;
            }

            .sfReviewButton:hover{
                color: #fff;
                background-color: #31b0d5;
                border-color: #269abc;
            }
        </style>
        <div class="notice notice-info sfReviewNotice" style="clear:both;">

            <div style="padding-top: 5px;">


                <table >
                    <tbody  style="width:calc(100% - 135px);">
                    <tr>
                        <td>
                            <img style="display: inline-block;width:128px;vertical-align: top;" src="<?php echo $this->Loader->URL?>images/icon.png">
                        </td>
                        <td>
                            <div style="display: inline-block; vertical-align: top;margin-left: 5px;"><span style="font-size: 16px;font-family: Verdana"><p style="padding-bottom: 1px;margin-bottom: 0;">
                                    <p>Looks like <strong>you have submitted more than 50 forms</strong> with all in one forms </p>
                                    <p style="padding-top: 5px;">That is great! If you have any suggestion to improve the plugin (maybe new fields? conditional logics? new features?) please <a target="_blank" href="https://wordpress.org/support/plugin/all-in-one-forms/">Let us know!</a></p>
                                    <p>Also if you have a chance please don't forget to 5 start review the plugin, this greatly help to continue developing and improving it, <a target="_blank" href="https://wordpress.org/support/plugin/all-in-one-forms/reviews/?filter=5">you can review the plugin here</a></p>
                            </div>
                        </td>

                    </tr>

                    </tbody>
                </table>
                <div style="clear: both;"></div>
            </div>
            <ul style="bottom:0;right:0;margin:0;display: flex;flex-direction: row;padding-top: 5px;justify-content: flex-end">
                <li style="margin-right: 10px"><a id="aioml" style="display: block" href="https://wordpress.org/support/plugin/additional-product-fields-for-woocommerce/reviews/?filter=5">Remind me later</a></li>
                <li><a id="aiosa" style="display: block" href="https://wordpress.org/support/plugin/additional-product-fields-for-woocommerce/reviews/?filter=5">Don't show again</a></li>
            </ul>
        </div>

        <script type="text/javascript">
            jQuery(document).ready( function($) {
                jQuery('#aioml').click(function(e){
                    e.preventDefault();
                    $.post( ajaxurl, {
                        action: 'rednao_wcpdfinv_remind_me'
                    });
                    jQuery('.sfReviewNotice').remove();
                });

                jQuery('#aiosa').click(function(e){
                    e.preventDefault();
                    $.post( ajaxurl, {
                        action: 'aio_dontshowagain'
                    });
                    jQuery('.sfReviewNotice').remove();
                });
            });
        </script> <?php
    }
}