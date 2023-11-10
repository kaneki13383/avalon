<template>
  <footer>
    <p>
      Copyright © 2023 <span> Avalon Technologies.</span> Все права защищены.
    </p>
    <ul>
      <li>Главная</li>
      <li>Клиентское соглашение</li>
    </ul>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
footer {
  margin-top: 75px;
  margin-bottom: 30px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 90%;
  margin-left: 5%;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  padding-top: 20px;
  p {
    font-size: 14px;
    color: #33383a;
    span {
      font-weight: bold;
    }
  }
  ul {
    display: flex;
    flex-direction: row;
    gap: 10px;
    li {
      font-size: 14px;
      color: #33383a;
    }
  }
}
</style>