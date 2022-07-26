<?php

namespace App\Mail;
use App\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use PDF;
class MailConf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $booking;
    public function __construct(Booking $booking)
    {
      $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $address = 'goldenland.travelagency@gmail.com';
      $subject = 'Your Booking Detail';
      $name = 'Golden Land';
      $pdf = PDF::loadView('pdf', ["booking"=>$this->booking]);
      $filename = "booking_{$this->booking->id}_{$this->booking->user_name}_{$this->booking->destination_name}";
      Storage::put('/pdf/'.$filename.'.pdf', $pdf->output());

    return $this->view('mail')
                 ->from($address, $name)
                 ->subject($subject)
                 ->attachData($pdf->output(),
                  "booking_{$this->booking->id}_{$this->booking->user_name}.pdf"
                );
    }
}
