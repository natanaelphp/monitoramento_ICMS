<?php

class TransactionsController extends BaseController
{
	public function all()
	{
		$transactions = Transaction::orderBy('id', 'desc')->paginate(5);

		return View::make('transactions.list')->with('transactions', $transactions);
	}

	public function create()
	{
		return View::make('transactions.create');
	}

	public function store()
	{
		$validation = Validator::make(Input::all(), Transaction::$rules);

		if ( $validation->fails() )
		{
			return Redirect::to('transacoes/nova')->withErrors($validation)->withInput();
		}
		else
		{
			$transaction = new Transaction();
			$transaction->desc 	= Input::get('desc');
			$transaction->date 	= DateTime::createFromFormat( 'd/m/Y', Input::get('date') )->format('Y-m-d');
			$transaction->value = Input::get('value');
			$transaction->icms 	= Input::get('icms');

			$transaction->save();

			return Redirect::to('transacoes');
		}
	}

	public function edit($id)
	{
		$transaction = Transaction::find($id);

		if ( $transaction == FALSE ) App::abort('404');

		return View::make('transactions.edit')->with('transaction', $transaction);
	}

	public function update($id)
	{
		$validation = Validator::make(Input::all(), Transaction::$rules);

		if ( $validation->fails() )
		{
			return Redirect::to('transacoes/alterar/'.$id)->withErrors($validation)->withInput();
		}
		else
		{
			$transaction = Transaction::find($id);
			$transaction->desc 	= Input::get('desc');
			$transaction->date 	= DateTime::createFromFormat( 'd/m/Y', Input::get('date') )->format('Y-m-d');
			$transaction->value = Input::get('value');
			$transaction->icms 	= Input::get('icms');

			$transaction->save();

			return Redirect::to('transacoes');
		}
	}	

	public function delete($id)
	{
		$transaction = Transaction::find($id);
		
		if ( $transaction == FALSE ) App::abort('404');

		return View::make('transactions.delete')->with('transaction', $transaction);
	}

	public function deletePost($id)
	{
		if ( Input::get('confirm') == 'DELETAR' )
		{
			$transaction = Transaction::find( Input::get('id') );
			$transaction->delete();

			return Redirect::to('transacoes');
		}
		else
		{
			return Redirect::to('transacoes/excluir/'.$id);
		}
	}

}
