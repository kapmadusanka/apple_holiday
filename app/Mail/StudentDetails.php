<?php

namespace App\Mail;

use App\Models\StudentParent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentDetails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $students=StudentParent::with(['get_student' => function($query){
                $query->join('class', 'class.id', '=', 'students.class_id')
                    ->selectRaw('students.*,(YEAR(CURDATE()) - YEAR(dob)) as student_age ,class.name as class_name');
            }])->with('get_parent')->get()->all();
        return $this->from('hello@app.com', 'Apple Holiday')
            ->subject('Student Details!')
            ->view('emails.student',['records'=>$students]);

    }
}
