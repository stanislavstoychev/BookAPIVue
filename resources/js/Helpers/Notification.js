class Notification {
    success() {
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Успешно изпълнено!',
            timeout: 1000,
        }).show();
    }

    error() {
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Нещо се обърка!',
            timeout: 3000,
        }).show();
    }


}
export default Notification = new Notification()
