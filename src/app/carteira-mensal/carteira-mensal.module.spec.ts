import { CarteiraMensalModule } from './carteira-mensal.module';

describe('CarteiraMensalModule', () => {
  let carteiraMensalModule: CarteiraMensalModule;

  beforeEach(() => {
    carteiraMensalModule = new CarteiraMensalModule();
  });

  it('should create an instance', () => {
    expect(carteiraMensalModule).toBeTruthy();
  });
});
