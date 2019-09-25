<form id="AddDayForm" class="ad-add-day-form">
    <label>Дата и время</label>
    <div class="date-time">
        <input type="date" name="date" class="form-control"/>
        <input type="time" name="time" class="form-control" value="12:00"/>
    </div>
    <label>Место доставки</label>
    <input class="form-control" name="place" type="text" />
    <div class="schedule">
        <input type="checkbox" name="schedule" id="Schedule"/> <br>
        <label for="Schedule">Создать расписание</label>
    </div>
    <label>Укажите интервал</label>
    <div class="interval">
        <input type="date" name="from" id="From" class="form-control">
        <span class="interval-minus">&mdash;</span>
        <input type="date" name="to" id="To" class="form-control">
    </div>
    <button class="btn btn-dark" type="button" onclick="HideAddDay()">Отмена</button>
    <button class="btn btn-primary" type="button" onclick="AddDay()">Создать</button>
</form>
