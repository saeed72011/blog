<?php

namespace App\Http\Livewire\Components;

use BadMethodCallException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class DatetimeLivewire extends Component
{
    use LivewireAlert;

    public $datetimeJ;
    public $second;
    public $minute;
    public $hour;
    public $day;
    public $month;
    public $year;
    public $startOrEnd;
    public $timeLandon = null;

    public function mount($startOrEnd)
    {
        $this->startOrEnd = $startOrEnd;
        $this->time();
    }


    public function time()
    {
        $this->datetimeJ = Jalalian::now()->toArray();
//        $this->second = $this->datetimeJ['second'];
//        $this->minute = $this->datetimeJ['minute'];
//        $this->hour = $this->datetimeJ['hour'];
        $this->day = $this->datetimeJ['day'];
        $this->month = $this->datetimeJ['month'];
        $this->year = $this->datetimeJ['year'];

    }

    public function updated()
    {
        $this->timeLandon = null;


        $checkData = CalendarUtils::checkDate($this->year, $this->month, $this->day);
        $checkTime = validateDate($this->hour . ':' . $this->minute . ':' . $this->second, 'H:i:s');

        if ($checkData && $checkTime) {

            $this->timeLandon = (new Jalalian
            (
                $this->year,
                $this->month,
                $this->day,
                $this->hour,
                $this->minute,
                $this->second
            )
            )->toCarbon()->toDateTimeString();

            if ($this->startOrEnd == 'start') {
                $this->emit('start', $this->timeLandon);
            } else {
                $this->emit('end', $this->timeLandon);
            }
        } else {
            if ($this->startOrEnd == 'start') {
                $this->emit('start', $this->timeLandon);
            } else {
                $this->emit('end', $this->timeLandon);
            }
        }
        $this->validate([
            'year' => 'required|numeric|min:1400',
            'month' => 'required|numeric|min:1|max:12',
            'day' => 'required|numeric|min:1|max:31',
            'hour' => 'required|numeric|min:0|max:23',
            'minute' => 'required|numeric|min:0|max:59',
            'second' => 'required|numeric|min:0|max:59',
        ], [],
            [
                'year' => 'سال',
                'month' => 'ماه',
                'day' => 'روز',
                'hour' => 'ساعت',
                'minute' => 'دقیقه',
                'second' => 'ثانیه',
            ]);

    }


    public function render()
    {
        return view('livewire.components.datetime-livewire');
    }
}
