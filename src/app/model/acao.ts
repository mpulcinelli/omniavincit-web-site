export interface Acao
{
    ID:number;
    CODIGO:string;
    //bid:number;
    //ask:number;
    LAST:number;
    ATUALIZACAO:Date;
    VOLATILIDADE:number;
}

// SystemJS bug:
// TS file must export something real in JS, not just interfaces
export const _dummy = undefined;
