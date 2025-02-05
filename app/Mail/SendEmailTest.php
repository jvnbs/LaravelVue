<?php 
namespace App\Mail;

use Illuminate\Mail\Mailable;

class SendEmailTest extends Mailable
{
    public $details;  // डेटा को पास करने के लिए

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;  // मेली में डेटा को पास करना
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.send_email_test')  // आपका मेली टेम्पलेट
                    ->with('details', $this->details);  // डेटा को भेजना
    }
}
