<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - remote';
$this->breadcrumbs = array(
	'Remote',
);
?>
<h1>Вставьте данный код на удаленный сайт.</h1>

<?php if($popup) {
//var_dump(Yii::app()->params['http']); die;
$http = Yii::app()->params['http'];

$str =  <<<JS
<script>
    window.onload = () => {
    const fetchPromise = fetch('$http/remote/$popup->id/', { method: 'POST' });
    function createPopup(body) {
      const x = window.top.outerWidth / 2 + window.top.screenX - 200;
      const y = window.top.outerHeight / 2 + window.top.screenY - 150;
      const params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=400,height=300,left=\${x},top=\${y}`;
      const align =
        'margin:0;position:absolute;top:50%;left:50%;-ms-transform:translate(-50%, -50%);transform: translate(-50%, -50%);';
      const btn =
        'background-color: #4caf50;color: white;padding: 10px 20px;text-align: center;font-size: 20px;cursor: pointer;';
      const divTop =
        'height: 75vh; background: black; color: white; position: relative;font-size: 24px;';
      const divBottom = 'height:25vh;position: relative';
      const newWindow = open('about:blank', 'test', params);
      newWindow.focus();
      const html = `<div style="\${divTop}"><p style="\${align}">\${body}</p></div><div style="\${divBottom}"><div id="closeWindow" style="\${align}\${btn}">Закрыть</div></div>`;
      newWindow.document.body.style.margin = '0';
      newWindow.document.body.insertAdjacentHTML('afterbegin', html);
      newWindow.document.querySelector('#closeWindow').onclick = () =>
        newWindow.close();
    }
    fetchPromise
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        if (data.show) {
            setTimeout(() => {
            createPopup(data.body);
          }, 10000);
        }
      });
  };
</script>
JS;
echo '<div style="overflow-x:scroll;"><pre>';
echo htmlspecialchars($str);
echo '</pre></div>';
}
else {
    echo '<p> Попап не найден!</p>';
}