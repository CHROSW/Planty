rndefine("#RNMainChangeOptionsPriceCondition",["#RNMainFormBuilderCore/ConditionBase.Options","#RNMainCore/EventManager"],(function(e,i){"use strict";class n extends e.ConditionBaseOptions{constructor(...e){super(...e),this.PriceName=""}LoadDefaultValues(){super.LoadDefaultValues(),this.Type="ChangeOptionsPrice",this.PriceName="Price"}}exports.ChangeOptionsPriceConditionOptions=n,i.EventManager.Subscribe("GetCondition",(e=>{if("ChangeOptionsPrice"==e.Type)return new n}))}));
