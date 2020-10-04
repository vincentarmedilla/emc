"{translate key='User'}","{translate key='Resource'}","{translate key='Title'}","{translate key='Description'}","{translate key='BeginDate'}","{translate key='EndDate'}","{translate key='Duration'}","{translate key='Created'}","{translate key='LastModified'}","{translate key='ReferenceNumber'}",{foreach from=$ReservationAttributes item=attr},"{$attr->Label()|escape:'quotes'}"{/foreach}
{foreach from=$reservations item=reservation}"{fullname first=$reservation->FirstName last=$reservation->LastName}","{$reservation->ResourceName|escape:'quotes'}","{$reservation->Title|escape:'quotes'}","{$reservation->Description|escape:'quotes'}","{formatdate date=$reservation->StartDate timezone=$Timezone key=res_popup}","{formatdate date=$reservation->EndDate timezone=$Timezone key=res_popup}","{$reservation->GetDuration()->__toString()}","{formatdate date=$reservation->CreatedDate timezone=$Timezone key=res_popup}","{formatdate date=$reservation->ModifiedDate timezone=$Timezone key=res_popup}","{$reservation->ReferenceNumber}",{foreach from=$ReservationAttributes item=attribute},"{$reservation->Attributes->Get($attribute->Id())|escape:'quotes'}"{/foreach}
{/foreach}
