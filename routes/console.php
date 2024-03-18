<?php

use Illuminate\Support\Facades\Schedule;

Schedule::call('pesapal:auth')->everyFourMinutes();
Schedule::call('model:prune')->everyThirtyMinutes();
