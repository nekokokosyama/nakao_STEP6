// 送信ボタン押下時
document.querySelector("form").addEventListener("submit", function(e) {

    // 値取得
    const name = document.querySelector('[name="name"]').value.trim();
    const companyName = document.querySelector('[name="companyName"]').value.trim();
    const email = document.querySelector('[name="email"]').value.trim();
    const age = document.querySelector('[name="age"]').value.trim();
    const message = document.querySelector('[name="message"]').value.trim();
  
    // ① 入力チェック（5-2 & 5-3）
    if (!name || !companyName || !email || !age || !message) {
      alert("必須項目が未入力です。入力内容をご確認ください。");
      e.preventDefault(); // 送信キャンセル
      return;
    }
  
    // ② 確認アラート（5-4）
    const confirmMessage =
  `下記の内容を送信しますか？
  
  お名前：${name}
  会社名：${companyName}
  メール：${email}
  年齢：${age}
  内容：${message}`;
  
    if (!confirm(confirmMessage)) {
      e.preventDefault(); // キャンセルしたら送信しない
    }
  });
  
  
  // ③ 背景色変更（5-5）
  const button = document.querySelector("#changeFooterColor"); // ボタンIDつける
  const footer = document.querySelector("footer");
  
  const colors = ["blue", "red", "yellow", "gray"];
  let index = 0;
  
  button.addEventListener("click", function() {
    footer.style.backgroundColor = colors[index];
    index++;
  
    // ループ
    if (index >= colors.length) {
      index = 0;
    }
  });
  