<?php

namespace ContactUs\Controllers;

class ContactUsController
{
    public function __construct()
    {
        add_shortcode('contact_us', [$this, 'renderContainerTagClasses']);
    }

    public function renderContainerTagClasses(array $aAtts = [])
    {
        $aAtts =
            shortcode_atts(
                [
                    'sub_title'                  => 'This is contact us form subtitle',
                    'title'                      => 'This is contact us form title',
                    'sm_left_input_placeholder'  => 'This is left placeholder',
                    'sm_left_input_type'         => 'This is left type',
                    'sm_left_input_size'         => '6',
                    'sm_right_input_placeholder' => 'This is right placeholder',
                    'sm_right_input_type'        => 'This is right type',
                    'sm_right_input_size'        => '6',
                    'message_placeholder'        => 'This is message placeholder',
                    'message_size'               => '12',
                    'message_row'                => '5',
                ],
                $aAtts,
            ); ?>
        <section id="contact-us" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5><?php echo $aAtts['sub_title'] ?></h5>
                        <h2><?php echo $aAtts['title'] ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-<?php echo $aAtts['sm_left_input_size'] ?> email">
                        <input placeholder="<?php echo $aAtts['sm_left_input_placeholder'] ?>"
                               type="<?php echo $aAtts['sm_left_input_type'] ?>"
                               id="email"
                               pattern=".+@globex.com"
                               size="30"
                               required>
                    </div>
                    <div class="col-12 col-lg-<?php echo $aAtts['sm_right_input_size'] ?> email">
                        <input placeholder="<?php echo $aAtts['sm_right_input_placeholder'] ?>"
                               type="<?php echo $aAtts['sm_left_input_type'] ?>"
                               id="subject"
                               size="30"
                               required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-<?php echo $aAtts['message_size'] ?> message">
                        <textarea id="message"
                                  name="message"
                                  rows="<?php echo $aAtts['message_row'] ?>">
                        <?php echo $aAtts['message_placeholder'] ?>
                        </textarea>
                    </div>
                    <div class="col-12">
                        <div class="hero-btns contact-btn">
                            <!-- Send Message Btn -->
                            <a href="#">Send Message</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}