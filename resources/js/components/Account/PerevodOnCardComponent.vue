<template>
  <div class="perevod_card">
    <i
      @click="Back()"
      class="bx bx-chevrons-left bx-flip-vertical"
      style="
        position: absolute;
        cursor: pointer;
        color: #9ba8bc;
        top: 110px;
        left: 20px;
        font-size: 35px;
      "
    ></i>
    <div v-if="bank == 'sber'">
      <SberCardVue />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Сафронов Мирон Артурович</p>
    </div>
    <div v-if="bank == 'tinkof'">
      <TinkofCard />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Гуров Денис Михайлович</p>
    </div>
    <div v-if="bank == 'alfa'">
      <AlfaCardVue />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Плаксин Матвей Сергеевич</p>
    </div>
    <div v-if="bank == 'vtb'">
      <VtbCardVue />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Новиков Михаил Сергеевич</p>
    </div>
    <div v-if="bank == 'raiffeisen'">
      <RaiffeisenCardVue />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Трофимова Ксения М.</p>
    </div>
    <div v-if="bank == 'mts'">
      <MtsCardVue />
      <p class="summ_perev">Сумма перевода: {{ balance }} ₽</p>
      <p>Получатель: Кудрявцев Игорь Дмитриевич</p>
    </div>
    <i class="bx bx-left-arrow-alt bx-tada bx-flip-vertical"></i>
    <div class="info">
      <div class="mini_info">
        <div class="line"></div>
        <p>1. Войдите в личный кабинет или приложения Вашего банка</p>
        <p>2. Сделайте перевод по номеру карты</p>
      </div>
      <p>
        3. После того, как вы сделали перевод, нажмите кнопку «Подтвердить
        перевод»
      </p>
      <button>
        <i class="bx bx-credit-card-front"></i> Подтвердить перевод
      </button>
    </div>
  </div>
</template>

<script>
import AlfaCardVue from "./Cards/AlfaCard.vue";
import MtsCardVue from "./Cards/MtsCard.vue";
import RaiffeisenCardVue from "./Cards/RaiffeisenCard.vue";
import SberCardVue from "./Cards/SberCard.vue";
import TinkofCard from "./Cards/TinkofCard.vue";
import VtbCardVue from "./Cards/VtbCard.vue";

export default {
  components: {
    SberCardVue,
    TinkofCard,
    AlfaCardVue,
    VtbCardVue,
    RaiffeisenCardVue,
    MtsCardVue,
  },
  props: ["bank", "balance"],
  data() {
    return {};
  },
  methods: {
    Back() {
      window.location.reload();
    },
  },
};
</script>

<style lang="scss" scoped>
.summ_perev {
  margin: 20px 0;
}
.perevod_card {
  background: white;
  border-radius: 7px;
  padding: 30px;
  width: 93%;
  margin-left: 1.5%;
  height: max-content;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  i {
    font-size: 50px;
    color: #888da869;
    margin: 0 20px;
  }
  .info {
    display: flex;
    flex-direction: column;
    gap: 20px;
    .mini_info {
      height: max-content;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 7px;
      box-shadow: 0px 0px 10px 1px rgb(27 26 26 / 30%);
      display: flex;
      flex-direction: column;
      gap: 20px;
      .line {
        margin-top: 30px;
        width: 300px;
        height: 33px;
        border-radius: 0;
        box-shadow: none;
        border: none;
        background: #dae2ef;
      }
      p {
        padding-left: 20px;
        width: 250px;
        font-size: 16px;
        font-weight: lighter;
        margin: 0;
      }
      p:last-child {
        padding-bottom: 20px;
      }
    }
    p {
      width: 300px;
      font-size: 14px;
    }
    button {
      cursor: pointer;
      font-size: 13px;
      padding: 15px 0;
      border-radius: 7px;
      border: none;
      background: #9ba8bc;
      color: #fff;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      i {
        font-size: 25px;
        color: #fff;
      }
    }
  }
}
</style>